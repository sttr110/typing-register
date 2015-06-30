<?php

class RegistsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('words', $this->Regist->find('all'));

  }

}
?>
