<?php 
  echo $this->Html->css('toppage');
  echo $this->Html->script('//code.jquery.com/jquery-1.11.3.min.js');
  echo $this->Html->script('key_attention');
  echo $this->Html->script('key_name');
?>

<h1>hello</h1>

<!--word格納用配列を作成-->
<script>
  var array = new Array();
</script>

<?php foreach($regist_data as $word) : ?>
  <!--登録されているwordをjs配列に格納 -->
  <script>
    array[<?php echo _json_php_encode($word['Regist']['id']); ?>] = <?php echo _json_php_encode($word['Regist']['word']); ?>;
  </script>
<?php endforeach; ?>

<!--js配列に格納されいるwordを表示 -->
<script>
for(i=0; i<array.length; i++) {
  if(array[i]) console.log(array[i]);
}
</script>


<div id="word"> 
</div>
<div id="word_alphabet">
</div>


<table>
	<tbody>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
			<td>9</td>
			<td>0</td>
		</tr>
		<tr>
			<td>q</td>
			<td>w</td>
			<td>e</td>
			<td>r</td>
			<td>t</td>
			<td>y</td>
			<td>u</td>
			<td>i</td>
			<td>o</td>
			<td>p</td>
		</tr>
		<tr>
			<td>a</td>
			<td>s</td>
			<td>d</td>
			<td id="key_70">f</td>
			<td>g</td>
			<td>h</td>
			<td>j</td>
			<td>k</td>
			<td>l</td>
			<td>;</td>
		</tr>
		<tr>
			<td>z</td>
			<td>x</td>
			<td>c</td>
			<td>v</td>
			<td>b</td>
			<td>n</td>
			<td>m</td>
			<td>,</td>
			<td>.</td>
			<td>/</td>
		</tr>
		<tr>
			<td colspan="10" id="space">space</td>
		</tr>
	</tbody>
</table>

<?php echo $this->Html->link('登録&管理', array('controller' => 'regists', 'action' => 'regist'));
?>
