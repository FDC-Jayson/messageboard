<!-- app/View/UserProfiles/edit.ctp -->
<div class="container">
    <h2>Edit Profile</h2>
    <br />
    <?php echo $this->Form->create('UserProfile', array('type' => 'file')); ?>
    <div class="d-flex justify-content-center">
        <div class="form-group d-flex">
            <img id="imagePreview" src="<?php echo '/img/profiles/' . $this->request->data['UserProfile']['image']; ?>" width="120" height="120" />
            <div class="d-flex align-items-center">
                <input type="file" name="data[UserProfile][imageFile]" class="form-control-file d-none" id="upload-image">
                <button type="button" class="btn btn-info ml-4" id="upload-image-btn">Upload Profile Image</button>
            </div>
        </div>
    </div>
    <?php
        // Add the "_method" hidden field to simulate a PUT request
        echo $this->Form->hidden('UserProfile.image');
        echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Name'));
        echo $this->Form->input('gender', array(
            'label' => 'Gender',
            'type' => 'select',
            'options' => array(
                'Male' => 'Male',
                'Female' => 'Female'
            ),
            'class' => 'form-control form-check-inline'
        ));        
        echo $this->Form->input('birthdate', array('type' => 'text', 'class' => 'form-control datepicker', 'label' => 'Birthdate', 'id' => 'datepicker'));
        echo $this->Form->input('hubby', array('class' => 'form-control', 'label' => 'Hubby'));
    ?>
    <?php echo $this->Form->end('Save Changes'); ?>
</div>


<?php echo $this->Html->script('/js/edit-user-profile.js'); ?>