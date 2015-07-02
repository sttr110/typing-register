<?php

class RegistsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('regist_data', $this->Regist->find('all'));
    
    //独自関数
    function _json_php_encode($data) {
      return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
  }
  
  public function regist() {
    $this->set('regist_data', $this->Regist->find('all'));
  
    //追加投稿
    if($this->request->is('post')) { 
      $this->Regist->create();
      if($this->Regist->save($this->request->data)) {
        return $this->redirect(array('action' => 'regist'));
      }
    }
  }
 
  public function fix($id = null) {
    //idがない場合の処理
    if(!$id) {
      throw new NotFoundException(__('idないぞ'));
    }
    
    //idを元に、そのレコードを抽出
    $regist_data = $this->Regist->findById($id);
    
    //idから抽出されたデータがない時の処理
    if(!$regist_data) {
      throw new NotFoundException(__('データはいってねぇ'));
    }

    //リクエストがpostかputで来た場合の処理
    if($this->request->is(array('post', 'put'))) {
      $this->Regist->id = $id;
      if($this->Regist->save($this->request->data)) {
        $this->Session->setFlash(__('修正しました'));
        return $this->redirect(array('action' => 'regist'));
      }
    }
    
    if(!$this->request->data) {
      $this->request->data = $regist_data;
    }
  }

  public function delete($id) {
    if($this->Regist->delete($id)) {
    }

    return $this->redirect(array('action' => 'regist'));
  }


}
?>
