<?php 
// app/Controller/MessagesController.php

App::uses('AppController', 'Controller');

class MessagesController extends AppController {
    public $components = array('RequestHandler');
    public $helpers = array('Html', 'Form', 'Js');
    public $uses = array('User', 'UserProfile', 'Message', 'DeletedMessage');

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->RequestHandler->respondAs('json', ['json']);
    }

    public function index() {
        // Auth user data
        $userData = $this->Auth->user();

        // Pass auth user data to rendered view
        $this->set(compact('userData'));
    }

    public function view($messageId) {
        // Display the details of a specific message
        $this->loadModel('Message');
        $message = $this->Message->findById($messageId);
        $this->set('message', $message);
    }

    public function send() {
        if ($this->request->is('post')) {
            // Save the message to the database
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                // Broadcast the message to all connected clients
                $messageData = $this->request->data;
                $socket->emit('message', $messageData);
    
                // Handle the response and redirect as needed
            } else {
                // Handle save error
            }
        }
    }

    public function test() { }

    public function htmlMainTemplate() {
        $this->layout = false;
        // Auth user data
        $userData = $this->Auth->user();

        // Pass auth user data to rendered view
        $this->set(compact('userData'));
    }
    
    public function htmlDetailsTemplate() {
        $this->layout = false;
        // Auth user data
        $userData = $this->Auth->user();

        // Pass auth user data to rendered view
        $this->set(compact('userData'));
    }

    public function htmlSendTemplate() {
        $this->layout = false;
        // Auth user data
        $userData = $this->Auth->user();

        // Pass auth user data to rendered view
        $this->set(compact('userData'));
    }

    public function apiGetMessages($userId, $page = 1) {
        $this->autoRender = false;
    
        $limit = 10;
        $offset = ($page - 1) * $limit;
    
        // Define the custom query to get message IDs
        $messageIdsQuery = "SELECT m.id
            FROM messages AS m
            WHERE
                (m.from_user_id = $userId AND m.to_user_id = $userId)
                OR (
                    (m.from_user_id = $userId OR m.to_user_id = $userId)
                    AND m.id = (
                        SELECT MAX(id)
                        FROM messages AS mss
                        WHERE (
                            (mss.from_user_id = m.from_user_id AND mss.to_user_id = m.to_user_id)
                            OR (mss.from_user_id = m.to_user_id AND mss.to_user_id = m.from_user_id)
                        )
                        AND (
                            mss.id NOT IN (
                                SELECT dm.message_id
                                FROM deleted_messages AS dm
                                WHERE dm.user_id = $userId AND dm.message_id = mss.id
                            )
                            OR (
                                mss.id NOT IN (
                                    SELECT dm.message_id
                                    FROM deleted_messages AS dm
                                    WHERE dm.user_id = $userId
                                )
                                AND mss.id = (
                                    SELECT MAX(id)
                                    FROM messages AS mss2
                                    WHERE (
                                        (mss2.from_user_id = m.from_user_id AND mss2.to_user_id = m.to_user_id)
                                        OR (mss2.from_user_id = m.to_user_id AND mss2.to_user_id = m.from_user_id)
                                    )
                                    AND mss2.id NOT IN (
                                        SELECT dm2.message_id
                                        FROM deleted_messages AS dm2
                                        WHERE dm2.user_id = $userId AND dm2.message_id = mss2.id
                                    )
                                )
                            )
                        )
                    )
                )
            ORDER BY m.created DESC
            LIMIT $limit OFFSET $offset;";
    
        $messageIds = $this->Message->query($messageIdsQuery);
  
        // Extract message IDs from the result
        $messageIds = array_map(function ($result) {
            return $result['m']['id'];
        }, $messageIds);

        $options = array(
            'conditions' => array('Message.id' => $messageIds),
            'order' => 'Message.created DESC',
            'contain' => array(
                'FromUser' => array(
                    'UserProfile'
                ),
                'ToUser' => array(
                    'UserProfile'
                )
            )
        );
     
        // Find the associated messages with user profiles
        $messages = $this->Message->find('all', $options);
    
        $this->response->type('json');
    
        if (empty($messages)) {
            $this->response->statusCode(404); // No messages found
            $this->response->body(json_encode(array(
                'error' => 'No messages found',
            )));
        } else {
            $hasMore = count($messages) >= $limit;
            $this->response->statusCode(200);
            $this->response->body(json_encode(array(
                'hasMore' => $hasMore,
                'messages' => $messages,
            )));
        }
    }

    public function apiGetMessageDetails($toUserId, $page = 1) {
        $this->autoRender = false;
        $limit = 10;
    
        // Get the currently logged-in user's ID
        $loggedInUserId = $this->Auth->user('id');
    
        // Add a condition to filter messages for the selected conversation user
        $conditions = array(
            'OR' => array(
                array('from_user_id' => $loggedInUserId, 'to_user_id' => $toUserId),
                array('from_user_id' => $toUserId, 'to_user_id' => $loggedInUserId)
            )
        );
    
        // Exclude messages found in deleted messages for the logged-in user
        $deletedMessages = $this->DeletedMessage->find('list', array(
            'conditions' => array('user_id' => $loggedInUserId),
            'fields' => array('message_id')
        ));
    
        if (!empty($deletedMessages)) {
            $conditions[] = array('NOT' => array('Message.id' => $deletedMessages));
        }
    
        $options = array(
            'conditions' => $conditions,
            'order' => 'Message.created DESC',
            'limit' => $limit,
            'page' => $page,
            'contain' => array(
                'FromUser' => array(
                    'UserProfile'
                ),
                'ToUser' => array(
                    'UserProfile'
                )
            )
        );
  
        // Find messages that meet the specified conditions
        $messages = $this->Message->find('all', $options);
    
        $this->response->type('json');
    
        if (empty($messages)) {
            $this->response->statusCode(404); // No messages found
            $this->response->body(json_encode(array(
                'error' => 'No messages found',
            )));
        } else {
            $hasMore = count($messages) >= $limit;
            $this->response->statusCode(200);
            $this->response->body(json_encode(array(
                'hasMore' => $hasMore,
                'messages' => $messages,
            )));
        }
    }

    public function apiSearchMessageGetCount($toUserId, $search = null) {
        $this->autoRender = false;
    
        // Get the currently logged-in user's ID
        $loggedInUserId = $this->Auth->user('id');
    
        // Add a condition to filter messages for the selected conversation user
        $conditions = array(
            'OR' => array(
                array('from_user_id' => $loggedInUserId, 'to_user_id' => $toUserId),
                array('from_user_id' => $toUserId, 'to_user_id' => $loggedInUserId)
            )
        );
    
        // Exclude messages found in deleted messages for the logged-in user
        $deletedMessages = $this->DeletedMessage->find('list', array(
            'conditions' => array('user_id' => $loggedInUserId),
            'fields' => array('message_id')
        ));
    
        if (!empty($deletedMessages)) {
            $conditions[] = array('NOT' => array('Message.id' => $deletedMessages));
        }
    
        // Add a search condition if a search term is provided
        if (!empty($search)) {
            $searchCondition = array(
                'OR' => array(
                    'Message.message LIKE' => "%$search%",
                )
            );
            $conditions[] = $searchCondition;
        }
    
        $options = array(
            'conditions' => $conditions,
        );
    
        // Get the total count of messages that match the conditions
        $messageCount = $this->Message->find('count', $options);
    
        $this->response->type('json');
        $this->response->statusCode(200);
        $this->response->body(json_encode(array(
            'messageCount' => $messageCount, // Total message count
        )));
    }
    
    public function apiSendMessage() {
        $this->autoRender = false;
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
      
            $messageData = array(
                'from_user_id' => $this->Auth->user('id'),
                'message' => $data['message']
            );
            
            $toUserIds = $data['userIds']; // Assuming you pass the target user IDs as an array
            
            $this->response->type('json');
            
            $messages = array(); // Store the created messages
            
            foreach ($toUserIds as $toUserId) {
                $messageData['to_user_id'] = $toUserId;
                
                if ($this->Message->save($messageData)) {
                    // $message = $this->Message->findById($this->Message->id);
                    $message = $this->Message->find('first', array(
                        'conditions' => array(
                            'Message.id' => $this->Message->id
                        ),
                        'contain' => array(
                            'FromUser' => array(
                                'UserProfile'
                            ),
                            'ToUser' => array(
                                'UserProfile'
                            )
                        )
                    ));
                    $messages[] = $message;
                }
            }
            
            if (!empty($messages)) {
                $this->response->statusCode(200);
                $this->response->body(json_encode($messages));
            } else {
                $this->response->statusCode(400);
                $this->response->body(json_encode(array(
                    'error' => 'Messages could not be sent to any recipients',
                )));
            }
        } else {
            $this->response->statusCode(400);
            $this->response->body(json_encode(array(
                'error' => 'Invalid request method',
            )));
        }
    }
    
    public function apiDeleteMessage($messageId, $userId) {
        $this->autoRender = false;
    
        $this->response->type('json');
    
        // Find the message by ID
        $message = $this->Message->findById($messageId);
    
        if (!empty($message)) {
            // Check if the message belongs to the logged-in user
            if ($message['Message']['from_user_id'] == $userId || $message['Message']['to_user_id'] == $userId) {
                // Create a record in the `deleted_messages` table to mark the message as deleted
                $deletedMessageData = array(
                    'user_id' => $userId, // Marked as deleted by the currently logged-in user
                    'message_id' => $messageId
                );
    
                // Assuming you have a DeletedMessage model
                $this->DeletedMessage->create();
                if ($this->DeletedMessage->save($deletedMessageData)) {
                    // Successfully marked the message as deleted
                    $this->response->statusCode(200);
                    $this->response->body(json_encode('Message marked as deleted'));
                } else {
                    $this->response->statusCode(400);
                    $this->response->body(json_encode(array(
                        'error' => 'Error marking the message as deleted',
                    )));
                }
            } else {
                $this->response->statusCode(403);
                $this->response->body(json_encode(array(
                    'error' => 'You do not have permission to delete this message',
                )));
            }
        } else {
            $this->response->statusCode(404);
            $this->response->body(json_encode(array(
                'error' => 'Message not found',
            )));
        }
    }
    
    public function apiDeleteConversation($toUserId) {
        $this->autoRender = false;

        // Get the ID of the currently logged-in user
        $loggedInUserId = $this->Auth->user('id');
    
        $this->response->type('json');
    
        // Check if the request is a POST request
        if ($this->request->is('post')) {
            // Define conditions to mark the conversation as deleted for the logged-in user
            $conditions = array(
                'OR' => array(
                    array(
                        'from_user_id' => $loggedInUserId,
                        'to_user_id' => $toUserId
                    ),
                    array(
                        'from_user_id' => $toUserId,
                        'to_user_id' => $loggedInUserId
                    )
                )
            );
    
            // Find messages that belong to the conversation but are not deleted
            $messages = $this->Message->find('all', array('conditions' => $conditions));
    
            if (!empty($messages)) {
                // Create records in the `deleted_messages` table to mark the conversation as deleted
                foreach ($messages as $message) {
                    $deletedMessageData = array(
                        'user_id' => $loggedInUserId, // Marked as deleted by the currently logged-in user
                        'message_id' => $message['Message']['id']
                    );
    
                    // Assuming you have a DeletedMessage model
                    $this->DeletedMessage->create();
                    if ($this->DeletedMessage->save($deletedMessageData)) {
                        // Successfully marked the message as deleted
                    }
                }
    
                $this->response->statusCode(200);
                $this->response->body(json_encode('Conversation marked as deleted'));
            } else {
                $this->response->statusCode(404);
                $this->response->body(json_encode(array(
                    'error' => 'No conversation found to mark as deleted',
                )));
            }
        } else {
            $this->response->statusCode(400);
            $this->response->body(json_encode(array(
                'error' => 'Invalid request method',
            )));
        }
    }

    public function apiMarkAsRead($toUserId) {
        $this->autoRender = false;
        // Find the message by ID
        $message = $this->Message->findById($messageId);
    
        // Check if the message exists
        if (!$message) {
            throw new NotFoundException('Message not found');
        }
    
        // Update the is_read flag to 1
        $this->Message->id = $messageId;
        $this->Message->saveField('is_read', 1);

        $this->response->type('json');
        $this->response->statusCode(200);
        $this->response->body(json_encode(array(
            'message' => $message,
            '_serialize' => 'message',
        )));
    }

    public function apiSearchContacts() {
        $this->autoRender = false;
        $this->response->type('json');
    
        if ($this->request->is('post')) {
            $searchValue = $this->request->data['search']; // Assuming you are posting the search value as 'search'
            $currentUserId = $this->Auth->user('id'); // Get the ID of the currently logged-in user
        
            // Configure the conditions to search in both User and UserProfile
            $conditions = array(
                'OR' => array(
                    'User.email LIKE' => "%$searchValue%",
                    'UserProfile.name LIKE' => "%$searchValue%"
                ),
                'NOT' => array(
                    'User.id' => $currentUserId
                )
            );
    
            // Use the Containable behavior to fetch related UserProfile data
            $this->User->Behaviors->load('Containable');
    
            $contacts = $this->User->find('all', array(
                'conditions' => $conditions,
                'contain' => 'UserProfile'
            ));
    
            // Return the search results in JSON format
            $this->response->statusCode(200);
            $this->response->body(json_encode(array(
                'contacts' => $contacts,
                '_serialize' => 'contacts'
            )));
        } else {
            $this->response->statusCode(400);
            $this->response->body(json_encode(array(
                'error' => 'Invalid request',
                '_serialize' => 'error'
            )));
        }
    }
}

