<?php

// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $name = 'User';

    // Define the association with the UserProfile model
    public $hasOne = array(
        'UserProfile' => array(
            'className' => 'UserProfile',
            'foreignKey' => 'user_id',
        )
    );
    // Table columns validation
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Name is required'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An email address is required'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email address is already taken'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email address'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Password is required'
            ),
            'match' => array(
                'rule' => 'validatePassword',
                'message' => 'Passwords do not match'
            )
        ),
    );
    
    // Custom validation method for password matching
    public function validatePassword($data) {
        if(isset($this->data[$this->alias]['confirm_password']) && isset($this->data[$this->alias]['password'])) {
            return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
        }
    }
    
    // Custom validation method for checking if a new email is unique
    public function isEmailUnique($email, $userId) {
        $conditions = array(
            'User.email' => $email,
            'User.id !=' => $userId // Exclude the current user
        );

        return !$this->hasAny($conditions);
    }

    public function checkPassword($oldPassword, $storedPassword) {
        // Hash the old password and compare it with the stored password
        return AuthComponent::password($oldPassword) === $storedPassword;
    }    

    public function updateEmail($userId, $newEmail) {
        $this->id = $userId; // Set the user ID for the update
        $this->saveField('email', $newEmail); // Update the email field

        return $this->id;
    }

    public function beforeSave($options = array()) {
        // Perform hashing of the password
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        /**
         * Action Checking if Update or Create
         * Add columns to the request depends on the Action
         * Columns (created_at and updated_at) with current date value.
        */
        if (!$this->id) {
            // Set created_at only when a new record is created
            $this->data[$this->alias]['created_at'] = date('Y-m-d H:i:s');
        } else {
            // Set updated_at when an existing record is updated
            $this->data[$this->alias]['updated_at'] = date('Y-m-d H:i:s');
        }

        return true;
    }

}
