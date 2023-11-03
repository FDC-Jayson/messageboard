<!-- app/View/Users/change_credentials.ctp -->
<h2>Change Account Email & Password</h2>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('email', array('label' => 'New Email'));
    echo $this->Form->end('Save Changes');
?>
