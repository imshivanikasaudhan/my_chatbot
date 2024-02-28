<!-- start section chatbot -->
<section>

  <style>
    .openChatBtn {
      border: 2px solid #fede00;
      color: #252424;
      font-weight: 600;
      border-radius: 20px;
      padding: 13px 12px;
      font-size: 18px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 83px;
    }

    .re {
      height: 200px;
      overflow-y: scroll;
      padding: 10px;
    }

    .openChat {
      position: fixed;
      border-radius: 20px;
      bottom: 126px;
      right: 15px;
      border: 3px solid #fede00;
      z-index: 9;
      background-color: #fff;
      padding: 10px;
    }

    .openChat section {
      width: 196px;
      background: #fff;
      height: 37px;
    }

    .openChat textarea {
      width: calc(100% - 0px);
      font-size: 18px;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      font-weight: 500;
      background: #dbdcde;
      color: rgb(0, 0, 0);
      resize: none;
      height: 80px;
      border-radius: 5px;
    }

    .openChat textarea:focus {
      background: #dbdcde;
      outline: none;
    }

    .openChat .form_chat .inbox .msg {
      max-width: 53%;
      margin-left: 10px;
    }

    .openChat .form_chat .user-inbox {
      justify-content: flex-end;
      margin: 13px 0;
    }

    .openChat .btn11 {
      background: #fede00;
      color: #252424;
      border-radius: 16px;
      /* padding: 8px; */
      font-weight: 100;
      border: none;
      cursor: pointer;
      width: 100%;
      margin: 5px 0;
    }

    .openChat .close {
      background-color: lightgreen;
    }

    .openChat .btn11:hover,
    .openChatBtn:hover {
      opacity: 1;
    }

    .inbox {
      margin-bottom: 10px;
    }

    .user-inbox {
      text-align: right;
    }

    .msg-header {
      padding: 5px;
    }

    .bot-inbox {
      text-align: left;
    }


    .input-data {
      margin-top: 76px;
    }

    .msg {
      padding-right: 14px;
      padding-top: 4px;
      height: 37px;
      border-radius: 10px;
      background: yellow;
      width: max-content;
      padding-left: 12px;
      word-break: break-all;
    }


    .user-inbox {
      padding-left: 14px;
      border-radius: 10px;
      padding-right: 14px;
      padding-top: 4px;
      height: 37px;
      background: yellow;
      width: max-content;
    }
  </style>

  <button class="openChatBtn mt-3" onclick="openForm(); closeForm();"><i class="fa-solid fa-comment" style=" font-size: xxx-large;color: #090909;"></i></button>
  <div class="container">
    <!-- <div class="openChat" style="overflow-y: auto; height: 390px; border: 2px solid #958f8f; border-radius: 16px;padding: 16px; bottom: 122px;"> -->
    <div class="openChat" style="display: none;">
      <section>
        <div class="row">
          <div class="col-md-6">
            <h1 class="heading" style="position: fixed;font-weight: 600;
            font-size: 25px;">ChatBot</h1>
          </div>
          <div class="col-md-3">
            <div id="google_translate_element" style="position:fixed;"></div>

          </div>
          <div class="col-md-6" style="display: flex;justify-content:end">

            <!-- <button style="background:#fff" type="button" class="btn11 close" onclick="closeForm()">X</button> -->

          </div>
        </div>
      </section>

      <form class="form_chat" id="chatForm">
        <div class="row">
          <div class="col-md-12">
            <div id="replay" class="re mt-4">
            <div class=" col-md-6 msg"><p>What is your name ?</p></div>
            <!-- <div class=" col-md-2 user-inbox" style="margin-left: 208px;"><p>' + value + '</p></div> -->
            </div>

          </div>

        </div>


        <div class="row mt-5">
          <div class="col-md-12">
            <div class="d-flex"> <input id="data" class="w-100 data" name="data" type="text" placeholder="Type something here.." required style="    height: 43px;
            outline: none;
            border: 2px solid #fede00;
            border-radius: 10px;
            padding: 26px;">

              <button type="submit" onclick="sendMessage()" class="btn111" name="send-btn" id="send-btn" style=" border: 2px solid #fede00;
           border-radius: 10px;">Send</button>
            </div>

          </div>
          <div class="col-md-12">
            <!-- <button type="button" class="btn11 close" onclick="closeForm()">Close</button> -->
          </div>
          <!-- <div class="input-data"> -->

          <!-- </div> -->


      </form>

    </div>

  </div>

  <script>
    
    function sendMessage() {
      var value = $("#data").val().trim();
      if (value !== '') {
        var msg = '<div class=" col-md-2 user-inbox" style="margin-left: 208px;"><p>' + value + '</p></div>';
        $("#replay").append(msg);
        $("#data").val('');

        // Scroll to bottom of #replay
        $("#replay").scrollTop($("#replay")[0].scrollHeight);

        // Start AJAX code
        $.ajax({
          url: 'message.php',
          type: 'POST',
          data: {
            text: value
          },
          success: function(result) {
            var reply = '<div class=" col-md-6 msg"><p>' + result + '</p></div>';
            $("#replay").append(reply);

            // Scroll to bottom of #replay after appending reply
            $("#replay").scrollTop($("#replay")[0].scrollHeight);
          },
          error: function(xhr, status, error) {
            console.error('AJAX request failed:', status, error);
          }
        });
      }
    }
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://apis.google.com/js/api.js"></script>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'af,sq,am,ar,hy,az,eu,be,bn,bs,bg,ca,ceb,ny,zh-cn,zh-tw,co,hr,cs,da,nl,en,eo,et,su,sw,sv,tg,ta,tt,te,th,tr,tk',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element')
    };
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <script>
    document.querySelector(".openChatBtn").addEventListener("click", function() {
      toggleForm();

    });

    function toggleForm() {
      var chatForm = document.querySelector(".openChat");
      if (chatForm.style.display === "block") {
        chatForm.style.display = "none";
      } else {
        chatForm.style.display = "block";

      }
    }

    document.getElementById("chatForm").addEventListener("submit", function(event) {
      event.preventDefault();
      sendMessage();
    });

    // Initial state: Hide the chat form
    document.querySelector(".openChat").style.display = "none";

    // document.querySelector("#replay").addEventListener("click", () => {
    //   window.scrollTo(0, document.body.scrollHeight)
    // });

    $(document).ready(function() {
      // Bind keypress event to the textarea to handle "Enter" key press
      $("#data").on('keypress', function(e) {
        if (e.which === 13) { // 13 is the Enter key code
          e.preventDefault(); // Prevent default behavior (form submission)
          sendMessage(); // Trigger sendMessage function when "Enter" key is pressed
        }
      });

      // Function to send message
      function sendMessage() {
        var value = $("#data").val().trim();
        if (value !== '') {
          var msg = '<div class=" col-md-2 user-inbox" style="margin-left: 208px;"><p>' + value + '</p></div>';
          $("#replay").append(msg);
          $("#data").val('');

          // Scroll to bottom of #replay
          $("#replay").scrollTop($("#replay")[0].scrollHeight);

          // Start AJAX code
          $.ajax({
            url: 'message.php',
            type: 'POST',
            data: {
              text: value
            },
            success: function(result) {
              var reply = '<div class=" col-md-10 msg"><p>' + result + '</p></div>';
              $("#replay").append(reply);

              // Scroll to bottom of #replay after appending reply
              $("#replay").scrollTop($("#replay")[0].scrollHeight);
            },
            error: function(xhr, status, error) {
              console.error('AJAX request failed:', status, error);
            }
          });
        }
      }


    });
  </script>

</section>