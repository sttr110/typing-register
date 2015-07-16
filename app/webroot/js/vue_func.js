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
                            console.log(registered_character);
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
                      console.log("次!");
                      console.log(display_alphabet[this.word_index]);
                      //2つ目以降の単語の最初のkeyを光らせる
                      this.next_key(display_alphabet[this.word_index].charAt(0));
                    },
                    stop_type: function() {
                      console.log("終了");
                      this.word_index = 0;
                    }
                }
            });

                         
