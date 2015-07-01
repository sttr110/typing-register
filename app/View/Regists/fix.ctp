<h2>修正ページ</h2>

<?php
echo $this->Form->create('Regist');
echo $this->Form->input('word');
echo $this->Form->input('word_alphabet');
echo $this->Form->end('修正');
?>

<?php echo $this->Html->link('登録ページに戻る', array('action' => 'regist'));?>
