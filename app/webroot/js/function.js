$(function() {
  document.onkeydown = type_key;

  function type_key() {
    if(event.keyCode == 70) {
      $("#key_f").css("background", "#fc8"); 
    }
  }
  document.onkeyup = type_key_up; 
  function type_key_up() {
    if(event.keyCode == 70) {
      $("#key_f").css("background", "#fff"); 
    }
  }
 
});
