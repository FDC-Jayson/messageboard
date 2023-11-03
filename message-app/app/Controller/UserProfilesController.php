<?php 

// app/Controller/UserProfilesController.php

App::uses('AppController', 'Controller');

class UserProfilesController extends AppController {
    public $name = 'UserProfiles';
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    public $uses = array('UserProfile', 'User');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function details() {
        // Check if the user is logged in
        if (!$this->Auth->user()) {
            $this->Flash->error('You must be logged in to view your profile.');
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    
        // Retrieve the logged-in user's data
        $userData = $this->Auth->user();

        // Set the user data for the view
        $this->set('userData', $userData);
    }
    

    public function edit() {
        if (in_array($this->request->method(), ["POST", "PUT"])) {
            // Handle form submission
            $data = $this->request->data;

            // Converting the birthdate string data to PHP date
            if ($data['UserProfile']['birthdate']) {
                $data['UserProfile']['birthdate'] = date("Y-m-d", strtotime($data['UserProfile']['birthdate']));
            }
    
            // Set the user_id to the currently logged-in user profile ID
            $userProfileId = $this->Auth->user('UserProfile.id');
            $data['UserProfile']['id'] = $userProfileId;
    
            // Make sure data meets validation rules
            $this->UserProfile->set($data);
            
            if ($this->UserProfile->validates()) {
                // Upload image if a file was selected
                if (!empty($data['UserProfile']['imageFile']['name'])) {
                    $file = $data['UserProfile']['imageFile'];
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    
                    // Customize filename using user email address
                    list($name, $domain) = explode('@', $this->Auth->user('email'));
    
                    $customFileName = $name . "." . $extension;
                    $path = 'img' . DS . 'profiles' . DS . $customFileName;
    
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($file['tmp_name'], WWW_ROOT . $path)) {
                        // Image upload successful && Data is valid, attempt to save
                        $data['UserProfile']['image'] = $customFileName;
                    } else {
                        // Handle upload error
                        $this->Session->setFlash('Error uploading the image.', 'error');
                    }
                }
    
                if ($this->UserProfile->save($data)) {
                    // Set success flash message
                    $this->Session->setFlash('Profile updated successfully.', 'success');
    
                    // Manually update the Auth component's user data
                    $this->Auth->login(array_merge($this->Auth->user(), $data));

                    // Redirect to the user profile page
                    $this->redirect(array('action' => 'details'));
                } else {
                    // Handle save error
                    $this->Session->setFlash('Error saving profile data.', 'error');
                }
            } else {
                // Handle validation errors
                $validationErrors = $this->UserProfile->validationErrors;
    
                if (!empty($validationErrors)) {
                    // Get the first validation error message
                    $firstError = reset($validationErrors);
                    // Set the first error as the error flash message
                    $this->Session->setFlash($firstError[0], 'error');
                } else {
                    // Handle other validation errors (if any)
                    $this->Session->setFlash('Validation error. Please check the form.', 'error');
                }
                // debug($validationErrors);
            }
        } else {
                    // Load user profile details for the form
            $userProfile = $this->UserProfile->findByUserId($this->Auth->user('id'));
            $this->request->data = $userProfile;
        }


    }
    
    
    
    
    
    
    

    

}
