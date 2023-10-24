<?php 

class MessagesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $data = $this->Message->find('all');
        var_dump($data);exit;
        $this->set('messages', $data);
    }
}