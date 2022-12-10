<?php
session_start();
include "../includes/admin_auth.php";
include '../includes//db.php';
// include "message.php";
// var_dump($conn);
// exit();

if(isset($_POST['submit'])){
  $error = array();

   if(empty($_POST['message'])){
     $error['message']= "Please Input Message";
   }

   if(empty($error)){
     $statement=$conn->prepare("INSERT INTO messages VALUES(NULL,:usm,:ms,NOW(),NOW()) ");
     $statement->bindParam("usm",$_SESSION['username']);
     $statement->bindParam(":ms",$_POST['message']);
     $statement->execute();
   }



}







 ?>


<!--
Inspired by https://dribbble.com/supahfunk
-->
<link rel="stylesheet" href="styles/chatbox.css" type="text/css">
<section class="avenue-messenger">
  <div class="menu">
   <div class="items">
     <span><a href="#" title="Minimize">&mdash;</a><br>
<!--
     <a href="">enter email</a><br>
     <a href="">email transcript</a><br>-->
     <a href="#" title="End Chat">&#10005;</a>
</span>
</div>
    <div class="button"> <a href="logout.php"  style="color:blue;">Logout</a>  </div>
  </div>
  <!-- <a href="Logout.php">Logout</a> -->
  <div class="agent-face">
    <div class="half">
     <img class="agent circle" src="img/JAY.jpg" alt="Saka Jay"></div>
  </div>
<div class="chat">
  <div class="chat-title">
    <h1>SAKA JAY</h1>
    <h2>RE/JAY</h2>
  <!--  <figure class="avatar">
      <img src="http://askavenue.com/img/17.jpg" /></figure>-->
  </div>
  <form class="" action="" method="post">
    <div class="messages">
      <!-- <div class="messages-content" ><span id="todo_board"></span></div> -->
      <div class="messages-content mCustomScrollbar _mCS_1 mCS_no_scrollbar">
        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;">
          <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
            <div class="message new">
              <figure class="avatar"></figure><span id="messages-content"></span>
              <!-- <div class="timestamp">11:55</div> -->
              <div class="checkmark-sent-delivered">✓</div>
              <div class="checkmark-read">✓</div>
            </div>
          </div>
          <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;">
            <div class="mCSB_draggerContainer">
              <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 0px; max-height: 59px;" oncontextmenu="return false;">
                <div class="mCSB_dragger_bar" style="line-height: 30px;">
                </div>
              </div>
              <div class="mCSB_draggerRail">
              </div></div></div></div>
        </div>


    </div>

    <div class="message-box">
      <textarea name="message" type="text" class="message-input" placeholder="Type message..."></textarea>
      <button id="btn" name="submit" type="submit" class="message-submit">Send</button>
    </div>
  </form>
</div>

<!--<div class="bg"></div>-->


<script type="text/javascript">
window.addEventListener("load",function() {
  messages.mCustomScrollbar();
  setTimeout(function() {
    getCurrentUsersTodo()
  }, 100);
});

// window.addEventListener("load",function(e){
// getCurrentUsersTodo()
//
//
//
//
// })

function getCurrentUsersTodo(){
  var method = "POST";
  var url = "message.php";
  var data = "user_id=<?= $_SESSION['id']?>";
  var xhr =  new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
    //  console.log(xhr.responseText);
      var res = JSON.parse(xhr.responseText);
      console.log(res);
      if(res.success){
        var html
        res.data.forEach(function(value, key){

         html +="<h6>"+value.username+" |  "+value.message+"</h6>";
        });
        document.getElementById("messages-content").innerHTML = html;

      }else{
        alert(res.failed);
      }
    }
  }

    xhr.open(method,url,true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send(data);

}


var messages = document.getElementsByClassName('messages-content'),
    d, h, m,
    i = 0;



function updateScrollbar() {
  messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
    scrollInertia: 10,
    timeout: 0
  });
}

function setDate(){
  d = new Date()
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
    $('<div class="checkmark-sent-delivered">&check;</div>').appendTo($('.message:last'));
    $('<div class="checkmark-read">&check;</div>').appendTo($('.message:last'));
  }
}

function insertMessage() {
  msg = getElementsByClassName('.message-input').val();
  if ($.trim(msg) == '') {
    return false;
  }
  $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
  setDate();
  $('.message-input').val(null);
  updateScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 1000 + (Math.random() * 20) * 100);
}

$('.message-submit').click(function() {
  insertMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    insertMessage();
    return false;
  }
})


function fakeMessage() {
  if ($('.message-input').val() != '') {
    return false;
  }
  $('<div class="message loading new"><figure class="avatar"><img src="http://askavenue.com/img/17.jpg" /></figure><span></span></div>').appendTo($('.mCSB_container'));
  updateScrollbar();

  setTimeout(function() {
    $('.message.loading').remove();
    $('<div class="message new"><figure class="avatar"><img src="http://askavenue.com/img/17.jpg" /></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
    i++;
  }, 1000 + (Math.random() * 20) * 100);

}

$('.button').click(function(){
  $('.menu .items span').toggleClass('active');
   $('.menu .button').toggleClass('active');
});

</script>
