$(function() {
  document.onkeydown = pushKey;

  function pushKey() {
    //押したキーを格納
    push_key = event.keyCode;

    if(event.keyCode == push_key) {
      $("#key_" + push_key).css("background", "#fc8"); 
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
 
});
