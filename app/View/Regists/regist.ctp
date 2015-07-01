<h2>登録ページ</h2>




<br>
<hr>
<h3>現在登録中の単語一覧</h3>
<table>
  <thead>
    <tr>
      <td>単語</td>
      <td>アルファベット</td>
    </tr>
  </thead>
<?php foreach($regist_data as $word): ?>


<tr>
  <td>
    <?php echo $word['Regist']['word']; ?>
  </td>
   <td style="color: #999;">
    <?php echo $word['Regist']['word_alphabet']; ?>
  </td>
  <td>
    <?php echo $this->Html->link('修正',array('action' => 'fix', $word['Regist']['id'])); ?>
  </td>
  <td>
    <?php echo $this->Html->link('削除',array('action' => 'delete', $word['Regist']['id'])); ?>
  </td>

</tr>

<?php endforeach; ?>
</table>

<br>
<br>
<br>
<hr>
<br>
<h3>新規追加</h3>
<?php
echo $this->Form->create('Regist');
echo $this->Form->input('word', array('label' => '単語'));
echo $this->Form->input('word_alphabet', array('label' => 'アルファベット'));
echo $this->Form->end('追加');
?>


