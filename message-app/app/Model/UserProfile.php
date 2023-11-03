<?php

// app/Model/UserProfile.php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class UserProfile extends AppModel {
    public $name = 'UserProfile';

    // Define the association with the User model
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        )
    );

    // Validation rules for the UserProfile model
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Name is required'
            ),
            'length' => array(
                'rule' => array('between', 5, 20),
                'message' => 'Name should be 5-20 characters'
            )
        ),
        'gender' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Gender is required',
                'allowEmpty' => false
            ),
            'valid' => array(
                'rule' => array('inList', array('Male', 'Female', 'Other')),
                'message' => 'Invalid gender'
            )
        ),
        'birthdate' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Birthdate is required',
                'allowEmpty' => false
            ),
            'valid' => array(
                'rule' => 'date',
                'message' => 'Invalid date format'
            )
        ),
        'image' => array(
            'validExtension' => array(
                'rule' => array('extension', array('jpg', 'jpeg', 'gif', 'png')),
                'message' => 'Accept only photo extensions .jpg, .gif, .png',
                'allowEmpty' => true, // Allow empty value (use this if the image is not required)
            )
        ),
        'hubby' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Hubby is required',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        /**
         * Action Checking if Update or Create
         * Add columns to the request depends on the Action
         * Columns (created_at and updated_at) with current date value.
        */
        if (!$this->id) {
            // Set created_at only when a new record is created
            $this->data['User']['created_at'] = date('Y-m-d H:i:s');
        } else {
            // Set updated_at when an existing record is updated
            $this->data['User']['updated_at'] = date('Y-m-d H:i:s');
        }

        return true;
    }
}
