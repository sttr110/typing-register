<?php 
  echo $this->Html->css('toppage');
  echo $this->Html->script('vue');
  echo $this->Html->script('//code.jquery.com/jquery-1.11.3.min.js');
  echo $this->Html->script('key_attention');
  echo $this->Html->script('key_name');
?>

<h1>hello</h1>

<!--word格納用配列を作成-->
<script>
  var display_word = new Array();
  var display_alphabet = new Array();
  var i = 0;
  $(function() {
    $(window).keyup(function(e) {
      vm.type();
    });
  });
</script>

<?php foreach($regist_data as $word) : ?>
  <!--登録されているwordをjs配列に格納 -->
  <script>
    display_word[i] = <?php echo _json_php_encode($word['Regist']['word']); ?>;
    display_alphabet[i] = <?php echo _json_php_encode($word['Regist']['word_alphabet']); ?>;
    i++;
  </script>
<?php endforeach; ?>

<!--js配列に格納されいるwordを表示 -->


<div id="word"> 
  <script>
   document.write(display_word[0]);
  </script>
  <br>
  <script>
    document.write(display_alphabet[0].charAt(0));
  </script>

</div>
<div id="word_alphabet">
 </div>

<script>
  var vm = new Vue({
                data: {
                    word_index: 0,
                    character_index: 0,
                },
                methods: {
                    type: function() {
                        registered_character = display_alphabet[this.word_index].charAt(this.character_index);
                        input_character = this.convertKey(event.keyCode);

                        if(registered_character == input_character) {
                            console.log(registered_character);
                            this.character_index++;

                            if(this.character_index == display_alphabet[this.word_index].length) {
                              this.character_index = 0;

                              if(word.length-1 <= this.word_index) {
                                console.log("終了");
                                this.word_index = 0;
                                return 0;
                              }
                              this.word_index++;
                              console.log("次!");
                              console.log(display_alphabet[this.word_index]);
                            }
                        }
                    },
                    convertKey: function(key_code) {
                      var tmp_char = String.fromCharCode(key_code);
                      return tmp_char.toLowerCase();
                    }
                }
            });
</script>

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
			<td>f</td>
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
