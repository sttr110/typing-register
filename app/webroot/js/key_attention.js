$(function() {
  document.onkeydown = pushKey;

  function pushKey() {
    //押したキーを格納
    push_key = event.keyCode;

    if(event.keyCode == push_key) {
      $("#key_" + push_key).css("background", "#ccc"); 
    }

    //backSpaceの無効化
    if(event.keyCode == 8 || event.keyCode == 20) {
      return false;
    }
  }

  document.onkeyup = pullKey; 
  function pullKey() {
    //離したキーを格納
    pull_key = event.keyCode;
    
    if(event.keyCode == pull_key) {
      $("#key_" + pull_key).css("background", "#fff"); 
    }
  }
 
  var display_word = new Array();
  var display_alphabet = new Array();
  function setWordAlphabet(word, alphabet, index) {
    display_word[index] = word; 
    display_alphabet[index] = alphabet; 
  }
  
 
});
