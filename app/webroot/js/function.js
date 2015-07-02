$(function() {
  document.onkeydown = type_key;

  function type_key () {
    if(event.keyCode == 70) {
      $("#key_f").css("color", "#fc8"); 
    }
  }
});
