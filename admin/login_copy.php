
<!DOCTYPE html>
<html>

<!-- Mirrored from pages.revox.io/dashboard/3.0.0/html/corporate/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Mar 2018 18:16:00 GMT -->
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Bru - IIIT-Delhi Hostel Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<meta name="google-signin-client_id" content="128444185702-4eucf6c9nbb2fd7miduu06q0rrqsvh0v.apps.googleusercontent.com">
<script src="../../../../cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script><link rel="apple-touch-icon" href="pages/ico/60.png">
<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
</head>
<body class="fixed-header menu-pin menu-behind">
<div class="login-wrapper ">

<div class="bg-pic">

<img src="assets/img/lec.jpg" data-src="assets/img/lec.jpg" data-src-retina="assets/img/lec.jpg" alt="" class="lazy">




</div>


<div class="login-container bg-white">
<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
<!--<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">-->
<h2>Bru - Hostel Portal</h2>
<p class="p-t-35">Sign in with your IIIT-D Account</p>

<form id="form-login" class="p-t-15" role="form" action="http://pages.revox.io/dashboard/3.0.0/html/corporate/index.html">

<!--<div class="form-group form-group-default">
<label>Login</label>
<div class="controls">
<input type="text" name="username" placeholder="User Name" class="form-control" required>
</div>
</div>


<div class="form-group form-group-default">
<label>Password</label>
<div class="controls">
<input type="password" class="form-control" name="password" placeholder="Credentials" required>
</div>
</div>-->

<div class="form-group form-group-default" style="text-align:center">
 <div class="g-signin2" data-onsuccess="onSignIn"></div>
</div>
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
</script>


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
        window.top.location = "/";
        //location.reload();
      }
      else{
        signOut();
        alert("You are not allowed to signin");
      }
    };
    xhr.send('tokenid=' + id_token);
  }
}
</script>

<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>


<div class="row">
<div class="col-md-6 no-padding sm-p-l-10">
<div class="checkbox ">
<input type="checkbox" value="1" id="checkbox1">
<label for="checkbox1">Keep Me Signed in</label>
</div>
</div>
<div class="col-md-6 d-flex align-items-center justify-content-end">
<a href="#" class="text-info small">Help? Contact Support</a>
</div>
</div>

</form>

<div class="pull-bottom sm-pull-bottom">
<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
<div class="col-sm-3 col-md-2 no-padding">
</div>
<div class="col-sm-9 no-padding m-t-10">
<p>
<small>
One stop portal for Hostels at Indraprastha Institue of Information Technology
</small>
</p>
</div>
</div>
</div>
</div>
</div>

</div>



</div>


<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
<script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="pages/js/pages.min.js"></script>
<script>
    $(function()
    {
      $('#form-login').validate()
    })
    </script>
</body>

<!-- Mirrored from pages.revox.io/dashboard/3.0.0/html/corporate/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Mar 2018 18:16:04 GMT -->
</html>