<?php 

// app/Controller/UsersController.php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $name = 'Users';
    public $uses = array('User', 'UserProfile');

    public function beforeFilter() {
        parent::beforeFilter();

        /** Allowed action for authentication validation */
        $this->Auth->allow('register', 'isUniqueEmail'); 
    }

    public function register() {
        if ($this->Auth->user()) {
            // If a user is already logged in, redirect to the dashboard or another page
            return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
        }
        if ($this->request->is('post')) {
            // Set the data for the User model
            $this->User->set($this->request->data);

            // Validate the data using CakePHP's built-in validation
            if ($this->User->validates()) {
                // Data is valid, proceed with registration

                // Create a new User record
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    // Retrieve the user's ID after saving
                    $userId = $this->User->id;

                    // Create user profile data
                    $userProfileData = array(
                        'user_id' => $userId,
                        'name' => $this->request->data['User']['name'],
                    );

                    $this->UserProfile->create();
                    if ($this->UserProfile->save($userProfileData)) {
                        $this->Session->setFlash('Registration successful.', 'success');
                        // Log in the user
                        if($this->Auth->login()) {
                            return $this->redirect('/registration-success-page');
                        }
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Session->setFlash('Error creating user profile.');
                    }
                } else {
                    $this->Session->setFlash('Error creating user.');
                }
            } else {
                // Validation failed, display error messages
                $this->Session->setFlash('Please correct the errors in the form.');
            }
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                // Log in the user
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('last_login_at', date('Y-m-d H:i:s'));

                $this->Session->setFlash('Login successful.', 'success');
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Invalid email or password. Please try again.', 'flash');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function changeEmail() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->User->findById($this->Auth->user('id'));
          
            // Check if the current email is modified
            if ($data['User']['email'] !== $user['User']['email']) {
                $newEmail = $data['User']['email'];
                if ($this->User->isEmailUnique($newEmail, $user['User']['id'])) {
       
                    if ($this->User->updateEmail($user['User']['id'], $newEmail)) {
                        // Manually update the Auth component's user data
                        $user['User']['email'] = $newEmail;
  
                        $this->Auth->login(
                            array_merge($this->Auth->user(), array('email' => $user['User']['email']))
                        );
    
                        $this->Session->setFlash('Email updated successfully.', 'success');
                        $this->redirect(array('controller' => 'userProfiles', 'action' => 'details'));
                    } else {
                        $this->Session->setFlash('Error updating email.', 'error');
                    }
                } else {
                    $this->Session->setFlash('The new email is already in use.', 'error');
                }
            } else {
                $this->Session->setFlash('No changes were made to your email.', 'info');
            }
        } else {
            // Load the current user's email for initializing the new email field
            $this->request->data['User']['email'] = $this->Auth->user('email');
        }
    }
    
    public function changePassword() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
    
            // Validate old password
            $user = $this->User->findById($this->Auth->user('id'));
            if (!$this->User->checkPassword($data['User']['old_password'], $user['User']['password'])) {
                $this->Session->setFlash('Old password is incorrect.', 'error');
            } else {
                // Perform validation for new password and confirm password
                if ($data['User']['password'] !== $data['User']['confirm_password']) {
                    $this->Session->setFlash('Passwords do not match.', 'error');
                } else {

                    $user['User']['password'] = $data['User']['password'];
                    $user['User']['confirm_password'] = $data['User']['confirm_password'];
                    
                    if ($this->User->save($user)) {
                        $this->Session->setFlash('Credentials updated successfully.', 'success');
                        $this->redirect(array('controller' => 'userProfiles', 'action' => 'details'));
                    } else {
                        $this->Session->setFlash('Error updating credentials.', 'error');
                    }
                }
    
            }
        } else {
            // Load the current user's email for initializing the new email field
            $this->request->data['User']['email'] = $this->Auth->user('email');
        }
    }
    
    public function isUniqueEmail() {
        $this->autoRender = false; // Disable rendering of a view
        $this->layout = 'ajax';

        if ($this->request->is('ajax')) {
            $email = $this->request->data['email'];

            $userExists = $this->User->hasAny(array('User.email' => $email));

            $this->response->type('json');
            echo json_encode(!$userExists);
        }
    }

    public function registrationSuccessPage() { }


}
