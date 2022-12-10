<link href='styles/style.css' rel='stylesheet' type='text/css'>
<title>JAYCHAT APP</title>
<!-- <link type="text/css" rel="stylesheet" href="styles/style.css"  /> -->
<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class"links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
				        <form class="form-signin" action="" method="post" name="form">
          <label for="username">Username</label>
          <input class="form-styling" type="text" name="username" placeholder=""/>
          <label for="password">Password</label>
          <input class="form-styling" type="text" name="password" placeholder=""/>
          <input type="checkbox" id="checkbox"/>
          <label for="checkbox" ><span class="ui"></span>Keep me signed in</label>
          <div class="btn-animate">
            <a class="btn-signin">Sign in</a>
          </div>
				        </form>

				        <form class="form-signup" action="" method="post" name="form">
          <label for="fullname">Full name</label>
          <input class="form-styling" type="text" name="fullname" placeholder=""/>
          <label for="email">Email</label>
          <input class="form-styling" type="text" name="email" placeholder=""/>
          <label for="password">Password</label>
          <input class="form-styling" type="text" name="password" placeholder=""/>
          <label for="confirmpassword">Confirm password</label>
          <input class="form-styling" type="text" name="confirmpassword" placeholder=""/>
          <a ng-click="checked = !checked" class="btn-signup">Sign Up</a>
				        </form>

            <div  class="success">
              <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 60 60" id="check" ng-class="checked ? 'checked' : ''">
                 <path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314
                  c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042
                  c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
                <div class="successtext">
                   <p> Thanks for signing up! Check your email for confirmation.</p>
                </div>
             </div>
      </div>

      <div class="forgot">
        <a href="#">Forgot your password?</a>
      </div>

      <div>
        <div class="cover-photo"></div>
        <div class="profile-photo"></div>
        <h1 class="welcome">Welcome, Chris</h1>
        <a class="btn-goback" value="Refresh" onClick="history.go()">Go back</a>
      </div>
  </div>

  <a id="refresh" value="Refresh" onClick="history.go()">
    <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
         xml:space="preserve">
         <path  d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
                c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
                c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
                c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
                c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
                l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z"/>
    </svg>
  </a>
</div>


var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

$(window).load(function() {
  $messages.mCustomScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 100);
});


function updateScrollbar() {
  $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
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
  msg = $('.message-input').val();
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

var Fake = [
  'Hi there, I\'m Jesse and you?',
  'Nice to meet you',
  'How are you?',
  'Not too bad, thanks',
  'What do you do?',
  'That\'s awesome',
  'Codepen is a nice place to stay',
  'I think you\'re a nice person',
  'Why do you think that?',
  'Can you explain?',
  'Anyway I\'ve gotta go now',
  'It was a pleasure chat with you',
  'Time to make a new codepen',
  'Bye',
  ':)'
]

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
<!--
Inspired by https://dribbble.com/supahfunk
-->
<section class="avenue-messenger">
  <div class="menu">
   <div class="items"><span>
     <a href="#" title="Minimize">&mdash;</a><br>
<!--
     <a href="">enter email</a><br>
     <a href="">email transcript</a><br>-->
     <a href="#" title="End Chat">&#10005;</a>

     </span></div>
    <div class="button">...</div>
  </div>
  <div class="agent-face">
    <div class="half">
     <img class="agent circle" src="http://askavenue.com/img/17.jpg" alt="Jesse Tino"></div>
  </div>
<div class="chat">
  <div class="chat-title">
    <h1>Jesse Tino</h1>
    <h2>RE/MAX</h2>
  <!--  <figure class="avatar">
      <img src="http://askavenue.com/img/17.jpg" /></figure>-->
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>
</div>
  </div>
<!--<div class="bg"></div>-->
