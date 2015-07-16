$(function() {
  document.onkeydown = pushKey;

  function pushKey() {
    //押したキーを格納
    push_key = event.keyCode;

    if(event.keyCode == push_key) {
      $("#key_" + push_key).css("background", "#d9d9d9"); 
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
  
});

  var i = 0;
  var display_word = new Array();
  var display_alphabet = new Array();
  function setWordAlphabet(word, alphabet, index) {
    display_word[index] = word; 
    display_alphabet[index] = alphabet; 
  }
  /*
  var display_word = new Array();
  var display_alphabet = new Array();
  var i = 0;
  */
  $(function() {
    $(window).keyup(function(e) {
      vm.type();
    });
  });
//キーコードを定義
var key_code = [ "49","50","51","52","53","54","55","56","57","48",
                 "81","87","69","82","84","89","85","73","79","80",
                 "65","83","68","70","71","72","74","75","76","186",
                 "90","88","67","86","66","78","77","188","190","191",
                 "32"
               ];
var key_name = ["1","2","3","4","5","6","7","8","9","0",
                "q","w","e","r","t","y","u","i","o","p",
                "a","s","d","f","g","h","j","k","l",";",
                "z","x","c","v","b","n","m",",",".","/",
                "space"
               ];

//tdの数繰り返す
$(function() {
  var i = key_code.length;
  $('td').each(function() {
    console.log();
    $(this).attr('id', 'key_' + key_code[i-key_code.length]);
    $(this).attr('class', 'key_' + key_name[i-key_name.length]);
  i++;
  });
});
