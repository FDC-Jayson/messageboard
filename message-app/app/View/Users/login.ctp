<!-- app/View/Users/login.ctp -->

<h2>Login</h2>
<?php
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
echo $this->Form->input('email', array('label' => 'Email'));
echo $this->Form->input('password', array('label' => 'Password'));
echo $this->Form->end('Login');
?>
<!-- <a href="/register" class="btn btn-primary ml-2 text-white">Register</a> -->