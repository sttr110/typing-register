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
<?php foreach($words as $word): ?>


<tr>
  <td>
    <?php echo $word['Regist']['word']; ?>
  </td>
   <td style="color: #999;">
    <?php echo $word['Regist']['word_alphabet']; ?>
  </td>
  
</tr>

<?php endforeach; ?>
</table>