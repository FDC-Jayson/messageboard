<!-- app/View/Users/register.ctp -->
<!-- Error messages container at the top -->
<?php
    if ($this->Session->check('Message.flash')) {
        echo $this->Session->flash('flash');
    }
?>
<div id="flashMessage" class="message" style="display:none"></div>

<h2>User Registration</h2>
<?php 
    echo $this->Form->create('User', array('id' => 'registration-form'));
    echo $this->Form->input('name', array('label' => 'Name'));
    echo $this->Form->input('email', array('label' => 'Email'));
    echo $this->Form->input('password', array('type' => 'password', 'label' => 'Password'));
    echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => 'Confirm Password'));
    echo $this->Form->end('Register');
?>

<?php echo $this->Html->script('/js/registration.js'); ?>

