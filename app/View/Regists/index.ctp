<?php 
  echo $this->Html->css('toppage');
  echo $this->Html->script('//code.jquery.com/jquery-1.11.3.min.js', array('inline' => false));
  echo $this->Html->script('vue', array('inline' => false));
  echo $this->Html->script('functions',array('inline' => false));
?>

<?php foreach($regist_data as $word) : ?>
  <!--登録されているwordをjs配列に格納 -->
  <script>
    word = <?php echo _json_php_encode($word['Regist']['word']); ?>;
    alphabet = <?php echo _json_php_encode($word['Regist']['word_alphabet']); ?>;
    setWordAlphabet(word, alphabet, i); 
    i++;
  </script>
<?php endforeach; ?>

<div id="show_words">
  <div id="word"> 
    <div v-text="show_word"></div>
  </div>
  <div id="word_alphabet">
    <div v-text="show_alphabet"></div>
  </div>
</div>

<script>
  var vm = new Vue({
    el: "#show_words",
    data: {
      word_index: 0,
      character_index: 0,
      show_word: display_word[0], 
      show_alphabet: display_alphabet[0], 
    },
    methods: {
      type: function() {
        //登録一文字と、入力一文字を変数に格納
        registered_character = display_alphabet[this.word_index].charAt(this.character_index);
	input_character = this.convertKey(event.keyCode);
	//登録文字と入力文字が一致したら、登録文字をインクリメント
	if(registered_character == input_character) {
	  this.character_index++;
	  //次のkeyのみを光らせる
	  this.next_key(display_alphabet[this.word_index].charAt(this.character_index));
	  //カウンターと単語長が同じになれば、カウンターを0にする、単語の添え字をインクリメント 
	  if(this.character_index == display_alphabet[this.word_index].length) this.next_word();
	    if(!display_alphabet[this.word_index]) {
              this.stop_type(); 
	      return 0;
	    }
	}
      },
      convertKey: function(key_code) {
         var tmp_char = String.fromCharCode(key_code);
	 return tmp_char.toLowerCase();
      },
      next_key: function(name) {
        $(".key_" + name).css("background", "#fc8"); 
      },
      next_word: function() {
        this.character_index = 0;
	this.word_index++;
	this.show_word = display_word[this.word_index];
	this.show_alphabet = display_alphabet[this.word_index];
	//2つ目以降の単語の最初のkeyを光らせる
	this.next_key(display_alphabet[this.word_index].charAt(0));
      },
      stop_type: function() {
        this.word_index = 0;
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
