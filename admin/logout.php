<?php 
session_start();
$_SESSION = array();
session_destroy();
?>
<meta name="google-signin-client_id" content="128444185702-4eucf6c9nbb2fd7miduu06q0rrqsvh0v.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
   <div class="g-signin2" data-onsuccess="signOut"></div>
<script type="text/javascript">
  function onSignIn(googleUser) {
  var id_token = googleUser.getAuthResponse().id_token;
  var profile = googleUser.getBasicProfile();
  var email = profile.getEmail();
  console.log('ID: ' + profile.getId()); 
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + email);
  var domain = email.replace(/.*@/, "");
  if(domain!="iiitd.ac.in"){
    signOut();
    alert("Sign in with your IIIT Delhi Account");
  }
  else{
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'token_sign_in.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if(xhr.responseText == "1"){
        console.log('Signed in as: ' + xhr.responseText);
        //location.reload();
      }
      else{
        alert("You are not allowed to signin");
      }
    };
    xhr.send('tokenid=' + id_token);
  }
}
</script>


<script>
  function signOut() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'logout.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      console.log('Logged out');
    };
    xhr.send('logout');
    // Google Logout
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  signOut();
</script>
