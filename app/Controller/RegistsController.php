<?php

class RegistsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {

  }
  
  public function regist() {
    $this->set('words', $this->Regist->find('all'));
  }
 
  public function fix() {
  
  }

  public function delete() {

  }

}
?>
