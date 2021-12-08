
<?php 
session_start();
include "inc/dbo.inc.php";
if(!isset($_SESSION['id']))
 header("location:/login.html");
$user_id = $_SESSION['id'];
 
$status = [];
$status[0] = "0";

$app_id = $_GET['id']; 
$a_sql = "SELECT * FROM application WHERE id = $app_id AND status=1";
$a_result = $conn->query($a_sql);
$a_details = $a_result->fetch_assoc();
//echo $a_details;

$as_sql = "SELECT COUNT(*) as count FROM request_table WHERE user_id = $user_id AND application_id = $app_id";
$as_result = $conn->query($as_sql);
$as_details = $as_result->fetch_assoc();


// print_r($a_details);

$sql = "SELECT * FROM hostel ORDER BY type";
$result = $conn->query($sql);
$hostels = $result->fetch_all();


$success = false;
if(isset($_POST['submit'])){

 $p1_hostel = $_POST['p1-hostel'];
 $p1_room = $_POST['p1-room'];
 $p2_hostel = $_POST['p2-hostel'];

 $p2_room = $_POST['p2-room'];
 $hostel_options = [1,2,3];
 $room_options = [1,2,3,4];
 $error = [];
 if(!in_array($p1_hostel, $hostel_options))
  $error[] = "Hostel 1 Priority should be from Boys Hostel or Girls Hostel";
 if(!in_array($p2_hostel, $hostel_options))
  $error[] = "Hostel 2 Priority should be from Boys Hostel or Girls Hostel";
 if(!in_array($p1_room, $room_options))
  $error[] = "Room Priority should be from Single, Double or Doormetry";
 if(!in_array($p2_room, $room_options))
  $error[] = "Room Priority should be from Single, Double or Doormetry";
  
 if(empty($error)){
   
   $ar_sql = "SELECT distance FROM student_profile WHERE user_id = $user_id";
   $ar_result = $conn->query($ar_sql);
   $ar_details = $ar_result->fetch_assoc();
   //$d = $ar_details['distance'];
   
   $query = "INSERT INTO request_table(user_id, application_id, hostel_type_1, hostel_type_2, room_type_1, room_type_2,acadsession) VALUES(?,?,?,?,?,?,?)";
   $stmt = $conn->prepare($query);
   $sem=$_SESSION['acadsession'];
   $stmt->bind_param("iiiiiis", $user_id, $app_id, $p1_hostel, $p2_hostel, $p1_room, $p2_room,$sem);

   if ($stmt->execute()) { 
    $success = true;
   } else {
      print_r($stmt->error);
   }
  }
  else{
   $status[0] = "400";
   $status[0] = "Error Occured";
   print_r($error);
  }
 
 
}

?>
<!DOCTYPE html>
<html>
 <?php 
 $page['title'] = "Dashboard";
 ?>

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Bru - Hostel Allocation - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
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
<link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/css/dashboard.widgets.css" rel="stylesheet" type="text/css" media="screen" />
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />


<script src="assets/plugins/interactjs/interact.min.js" type="text/javascript"></script>
<script src="assets/plugins/moment/moment-with-locales.min.js"></script>
<script src="pages/js/pages.calendar.min.js"></script>

</head>


<body class="fixed-header horizontal-menu horizontal-app-menu dashboard">

<?php include "header.inc.php"; ?>

<div class="page-container ">

<div class="page-content-wrapper ">

<div style="background-color:white;">
<div class="content ">

<div class="jumbotron">
<div class=" container p-l-0 p-r-0   container-fixed-lg sm-p-l-0 sm-p-r-0">
<div class="inner">

<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Apply</li>
</ol>

</div>
</div>
</div>


<div class=" container    container-fixed-lg">
        <h5><?= $a_details['name'] ?></h5>
        <div class="row">
        
        <?php if($as_details['count'] == 0):?>
        
        <?php if($success == false){?>
        
            <div class="col-md-12">

                 <div class="card card-transparent">
                 <div class="card-block">
                 <form id="form-personal" role="form" autocomplete="off" novalidate="novalidate" method="POST">
                  <input type="hidden" name="csrf" value="<?= $a_details['rand_key'];?>">
                 <div class="row clearfix">
                 <div class="col-md-12">
                 <div class="form-group form-group-default" aria-required="true">
                 <label>Name</label>
                 <input type="text" class="form-control" name="firstName" required="" aria-required="true" value="<?= $_SESSION['name'];?>" disabled>
                 </div>
                 </div>
                 <!--<div class="col-md-6">-->
                 <!--<div class="form-group form-group-default">-->
                 <!--<label>Last name</label>-->
                 <!--<input type="text" class="form-control" name="lastName" required="" aria-required="true">-->
                 <!--</div>-->
                 <!--</div>-->
                 </div>
                 <div class="row">
                 <div class="col-md-6">
                  <h5>Priority 1</h5>
                 <div class="form-group form-group-default input-group">
                    
                    <div class="form-group form-group-default form-group-default-select2 required">
                     <label class="">Hostel</label>
                     <select class="full-width select2-hidden-accessible" name="p1-hostel" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                     <optgroup label="Boys Hostel">
                    <?php foreach($hostels as $hostel):?>
                     <?php if($hostel[1] == 1){?>
                     <option value="<?= $hostel[0]; ?>"><?= $hostel[2]; ?></option>
                     <?php } ?>
                    <?php endforeach;?>
                     </optgroup>
                     <optgroup label="Girls Hostel">
                      <?php foreach($hostels as $hostel):?>
                        <?php if($hostel[1] == 2){?>
                        <option value="<?= $hostel[0]; ?>"><?= $hostel[2]; ?></option>
                        <?php } ?>
                    <?php endforeach;?>
   
                     </optgroup>
                     </select>
                     </div>
                 
                      
                 
                 </div>
                 
                 <div class="form-group form-group-default input-group">
                    
                    <div class="form-group form-group-default form-group-default-select2 required">
                     <label class="">Room Type</label>
                     <select class="full-width select2-hidden-accessible" name="p1-room" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                     <optgroup label="Room Type">
              
                     <option value="1">Single</option>
                     <option value="2">Double</option>
                     <option value="3">Triple</option>
                     <option value="4">Dormitory</option>
               
                     </optgroup>
                     </select>
                     </div>
                 
                      
                 
                 </div>
                 </div>
                 
           
           <div class="col-md-6">
             <h5>Priority 2</h5>
                 <div class="form-group form-group-default input-group">
                    
                    <div class="form-group form-group-default form-group-default-select2 required">
                     <label class="">Hostel</label>
                     <select class="full-width select2-hidden-accessible" name="p2-hostel" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                      <optgroup label="Boys Hostel">
                    <?php foreach($hostels as $hostel):?>
                     <?php if($hostel[1] == 1){?>
                     <option value="<?= $hostel[0]; ?>"><?= $hostel[2]; ?></option>
                     <?php } ?>
                    <?php endforeach;?>
                     </optgroup>
                     <optgroup label="Girls Hostel">
                      <?php foreach($hostels as $hostel):?>
                        <?php if($hostel[1] == 2){?>
                        <option value="<?= $hostel[0]; ?>"><?= $hostel[2]; ?></option>
                        <?php } ?>
                    <?php endforeach;?>
   
                     </optgroup>
                     </select>
                     </div>
                 
                      
                 
                 </div>
                 
                 <div class="form-group form-group-default input-group">
                    
                    <div class="form-group form-group-default form-group-default-select2 required">
                     <label class="">Room Type</label>
                     <select class="full-width select2-hidden-accessible" name="p2-room" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                     <optgroup label="Room Type">
              
                     <option value="1">Single</option>
                     <option value="2">Double</option>
                     <option value="3">Triple</option>
                     <option value="4">Dormitory</option>
               
                     </optgroup>
                     </select>
                     </div>
                 
                      
                 
                 </div>
                 </div>
           
           
           
           
           
           
                 
                 
                 </div>
                 
                 
                 
                 <div class="row">
                 <div class="col-md-12">
                        
                 </div>
                 </div>
                 <!--<div class="row">-->
                 <!--<div class="col-md-12">-->
                 <!--<div class="form-group form-group-default">-->
                 <!--<label>Email</label>-->
                 <!--<input type="email" class="form-control" name="email" placeholder="We’ll send your login details to this address" required="" aria-required="true" aria-invalid="false" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">-->
                 <!--</div>-->
                 <!--</div>-->
                 <!--</div>-->
                 <!--<p class="pull-left">-->
                 <!--I agree to the <a href="#">Pages Terms</a> and <a href="#">Privacy</a>.-->
                 <!--</p>-->
                 <!--<p class="pull-right">-->
                 <!--<a href="#">Help? Contact Support</a>-->
                 <!--</p>-->
                 <div class="clearfix"></div>
                 <div class="col-md-12" style="text-align:center;"> 
                  <button class="btn btn-primary" type="submit" style="background: #00A0B0!important; border-color=00A0B0!important;" name="submit">Apply Now</button>
                 </div>
                 </form>
                 </div>
                 </div>
                 <?php }else{
                  ?>
                 
                   <div class="alert alert-info" align="center">
  <strong>Successfully Applied!</strong>
</div>
                  
                  <?php
                 }
                 
                 else: ?>
                   
                 
                   
                 <div class="alert alert-info">
                 <strong>Already Submitted</strong>
                 </div>
               
             <?php endif;?>
                 
                 </div>
        </div>

</div>

</div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>

<div class=" container   container-fixed-lg footer">
<div class="copyright sm-text-center">
<p class="small no-margin pull-left sm-pull-reset">
<span class="hint-text">Copyright &copy; 2017 </span>
<span class="font-montserrat">Bru</span>.
<span class="hint-text">All rights reserved. </span>
<span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
</p>
<p class="small no-margin pull-right sm-pull-reset">
Hand-crafted <span class="hint-text">at IIIT-Delhi</span>
</p>
<div class="clearfix"></div>
</div>
</div>

</div>

</div>


<div id="quickview" class="quickview-wrapper" data-pages="quickview">

<ul class="nav nav-tabs">
<li class="" data-target="#quickview-notes" data-toggle="tab">
<a href="#">Notes</a>
</li>
<li data-target="#quickview-alerts" data-toggle="tab">
<a href="#">Alerts</a>
</li>
<li class="active" data-target="#quickview-chat" data-toggle="tab">
<a href="#">Chat</a>
</li>
</ul>
<a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>

<div class="tab-content">

<div class="tab-pane no-padding" id="quickview-notes">
<div class="view-port clearfix quickview-notes" id="note-views">

<div class="view list" id="quick-note-list">
<div class="toolbar clearfix">
<ul class="pull-right ">
<li>
<a href="#" class="delete-note-link"><i class="fa fa-trash-o"></i></a>
</li>
<li>
<a href="#" class="new-note-link" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="fa fa-plus"></i></a>
</li>
</ul>
<button class="btn-remove-notes btn btn-xs btn-block hide"><i class="fa fa-times"></i> Delete</button>
</div>
<ul>

<li data-noteid="1">
<div class="left">

<div class="checkbox check-warning no-margin">
<input id="qncheckbox1" type="checkbox" value="1">
<label for="qncheckbox1"></label>
</div>


<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

</div>

<div class="right pull-right">

<span class="date">12/12/14</span>
<a href="#" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="fa fa-chevron-right"></i></a>

</div>

</li>


<li data-noteid="2">
<div class="left">

<div class="checkbox check-warning no-margin">
<input id="qncheckbox2" type="checkbox" value="1">
<label for="qncheckbox2"></label>
</div>


<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

</div>

<div class="right pull-right">

<span class="date">12/12/14</span>
<a href="#"><i class="fa fa-chevron-right"></i></a>

</div>

</li>


<li data-noteid="2">
<div class="left">

<div class="checkbox check-warning no-margin">
<input id="qncheckbox3" type="checkbox" value="1">
<label for="qncheckbox3"></label>
</div>


<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

</div>

<div class="right pull-right">

<span class="date">12/12/14</span>
<a href="#"><i class="fa fa-chevron-right"></i></a>

</div>

</li>
 

<li data-noteid="3">
<div class="left">

<div class="checkbox check-warning no-margin">
<input id="qncheckbox4" type="checkbox" value="1">
<label for="qncheckbox4"></label>
</div>


<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

</div>

<div class="right pull-right">

<span class="date">12/12/14</span>
<a href="#"><i class="fa fa-chevron-right"></i></a>

</div>

</li>


<li data-noteid="4">
<div class="left">

<div class="checkbox check-warning no-margin">
<input id="qncheckbox5" type="checkbox" value="1">
<label for="qncheckbox5"></label>
</div>


<p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

</div>

<div class="right pull-right">

<span class="date">12/12/14</span>
<a href="#"><i class="fa fa-chevron-right"></i></a>

</div>

</li>

</ul>
</div>

<div class="view note" id="quick-note">
<div>
<ul class="toolbar">
<li><a href="#" class="close-note-link"><i class="pg-arrow_left"></i></a>
</li>
<li><a href="#" data-action="Bold" class="fs-12"><i class="fa fa-bold"></i></a>
</li>
<li><a href="#" data-action="Italic" class="fs-12"><i class="fa fa-italic"></i></a>
</li>
<li><a href="#" class="fs-12"><i class="fa fa-link"></i></a>
</li>
</ul>
<div class="body">
<div>
<div class="top">
<span>21st april 2014 2:13am</span>
</div>
<div class="content">
<div class="quick-note-editor full-width full-height js-input" contenteditable="true"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="tab-pane no-padding" id="quickview-alerts">
<div class="view-port clearfix" id="alerts">

<div class="view bg-white">

<div class="navbar navbar-default navbar-sm">
<div class="navbar-inner">

<a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<i class="pg-more"></i>
</a>

<div class="view-heading">
Notications
</div>

<a href="#" class="inline action p-r-10 pull-right link text-master">
<i class="pg-search"></i>
</a>

</div>
</div>


<div data-init-list-view="ioslist" class="list-view boreded no-top-border">

<div class="list-view-group-container">

<div class="list-view-group-header text-uppercase">
Calendar
</div>

<ul>

<li class="alert-list">

<a href="javascript:;" class="align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<p class="">
<span class="text-warning fs-10"><i class="fa fa-circle"></i></span>
</p>
<p class="p-l-10 overflow-ellipsis fs-12">
<span class="text-master">David Nester Birthday</span>
</p>
<p class="p-r-10 ml-auto fs-12 text-right">
<span class="text-warning">Today <br></span>
<span class="text-master">All Day</span>
</p>
</a>


</li>


<li class="alert-list">

<a href="#" class="align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<p class="">
<span class="text-warning fs-10"><i class="fa fa-circle"></i></span>
</p>
<p class="p-l-10 overflow-ellipsis fs-12">
<span class="text-master">Meeting at 2:30</span>
</p>
<p class="p-r-10 ml-auto fs-12 text-right">
<span class="text-warning">Today</span>
</p>
</a>

</li>

</ul>
</div>

<div class="list-view-group-container">

<div class="list-view-group-header text-uppercase">
Social
</div>

<ul>

<li class="alert-list">

<a href="javascript:;" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<p class="">
<span class="text-complete fs-10"><i class="fa fa-circle"></i></span>
</p>
<p class="col overflow-ellipsis fs-12 p-l-10">
<span class="text-master link">Jame Smith commented on your status<br></span>
<span class="text-master">“Perfection Simplified - Company Revox"</span>
</p>
</a>

</li>


<li class="alert-list">

<a href="javascript:;" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<p class="">
<span class="text-complete fs-10"><i class="fa fa-circle"></i></span>
</p>
<p class="col overflow-ellipsis fs-12 p-l-10">
<span class="text-master link">Jame Smith commented on your status<br></span>
<span class="text-master">“Perfection Simplified - Company Revox"</span>
</p>
</a>

</li>

</ul>
</div>
<div class="list-view-group-container">

<div class="list-view-group-header text-uppercase">
Sever Status
</div>

<ul>

<li class="alert-list">

<a href="#" class="p-t-10 p-b-10 align-items-center" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<p class="">
<span class="text-danger fs-10"><i class="fa fa-circle"></i></span>
</p>
<p class="col overflow-ellipsis fs-12 p-l-10">
<span class="text-master link">12:13AM GTM, 10230, ID:WR174s<br></span>
<span class="text-master">Server Load Exceeted. Take action</span>
</p>
</a>

</li>

</ul>
</div>
</div>

</div>

</div>
</div>

<div class="tab-pane active no-padding" id="quickview-chat">
<div class="view-port clearfix" id="chat">
<div class="view bg-white">

<div class="navbar navbar-default">
<div class="navbar-inner">

<a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<i class="pg-plus"></i>
</a>

<div class="view-heading">
Chat List
<div class="fs-11">Show All</div>
</div>

<a href="#" class="inline action p-r-10 pull-right link text-master">
<i class="pg-more"></i>
</a>

</div>
</div>
 
<div data-init-list-view="ioslist" class="list-view boreded no-top-border">
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">
a</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">ava flores</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">b</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/2x.jpg" data-src="assets/img/profiles/2.jpg" src="assets/img/profiles/2x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">bella mccoy</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/3x.jpg" data-src="assets/img/profiles/3.jpg" src="assets/img/profiles/3x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">bob stephens</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">c</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">carole roberts</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/5x.jpg" data-src="assets/img/profiles/5.jpg" src="assets/img/profiles/5x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">christopher perez</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">d</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">danielle fletcher</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/7x.jpg" data-src="assets/img/profiles/7.jpg" src="assets/img/profiles/7x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">david sutton</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">e</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">earl hamilton</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
 </li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/9x.jpg" data-src="assets/img/profiles/9.jpg" src="assets/img/profiles/9x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">elaine lawrence</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">ellen grant</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/2x.jpg" data-src="assets/img/profiles/2.jpg" src="assets/img/profiles/2x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">erik taylor</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/3x.jpg" data-src="assets/img/profiles/3.jpg" src="assets/img/profiles/3x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">everett wagner</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">f</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
 <span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">freddie gomez</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">g</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/5x.jpg" data-src="assets/img/profiles/5.jpg" src="assets/img/profiles/5x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">glen jensen</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">gwendolyn walker</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">j</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/7x.jpg" data-src="assets/img/profiles/7.jpg" src="assets/img/profiles/7x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">janet romero</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">k</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">kim martinez</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">l</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/9x.jpg" data-src="assets/img/profiles/9.jpg" src="assets/img/profiles/9x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">lawrence white</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">leroy bell</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/2x.jpg" data-src="assets/img/profiles/2.jpg" src="assets/img/profiles/2x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">letitia carr</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/3x.jpg" data-src="assets/img/profiles/3.jpg" src="assets/img/profiles/3x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">lucy castro</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">m</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">mae hayes</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/5x.jpg" data-src="assets/img/profiles/5.jpg" src="assets/img/profiles/5x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">marilyn owens</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">marlene cole</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/7x.jpg" data-src="assets/img/profiles/7.jpg" src="assets/img/profiles/7x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">marsha warren</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
 </a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">marsha dean</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/9x.jpg" data-src="assets/img/profiles/9.jpg" src="assets/img/profiles/9x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">mia diaz</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">n</div>
<ul>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">noah elliott</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">p</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/2x.jpg" data-src="assets/img/profiles/2.jpg" src="assets/img/profiles/2x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">phyllis hamilton</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">r</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/3x.jpg" data-src="assets/img/profiles/3.jpg" src="assets/img/profiles/3x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">raul rodriquez</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">rhonda barnett</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/5x.jpg" data-src="assets/img/profiles/5.jpg" src="assets/img/profiles/5x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">roberta king</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">s</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">scott armstrong</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/7x.jpg" data-src="assets/img/profiles/7.jpg" src="assets/img/profiles/7x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">sebastian austin</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">sofia davis</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">t</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/9x.jpg" data-src="assets/img/profiles/9.jpg" src="assets/img/profiles/9x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">terrance young</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" src="assets/img/profiles/1x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">theodore woods</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/2x.jpg" data-src="assets/img/profiles/2.jpg" src="assets/img/profiles/2x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">todd wood</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>


<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/3x.jpg" data-src="assets/img/profiles/3.jpg" src="assets/img/profiles/3x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">tommy jenkins</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
<div class="list-view-group-container">
<div class="list-view-group-header text-uppercase">w</div>
<ul>

<li class="chat-user-list clearfix">
<a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
<span class="thumbnail-wrapper d32 circular bg-success">
<img width="34" height="34" alt="" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg" class="col-top">
</span>
<p class="p-l-10 ">
<span class="text-master">wilma hicks</span>
<span class="block text-master hint-text fs-12">Hello there</span>
</p>
</a>
</li>

</ul>
</div>
</div>
</div>

<div class="view chat-view bg-white clearfix">

<div class="navbar navbar-default">
<div class="navbar-inner">
<a href="javascript:;" class="link text-master inline action p-l-10 p-r-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
<i class="pg-arrow_left"></i>
</a>
<div class="view-heading">
John Smith
<div class="fs-11 hint-text">Online</div>
</div>
<a href="#" class="link text-master inline action p-r-10 pull-right ">
<i class="pg-more"></i>
</a>
</div>
</div>


<div class="chat-inner" id="my-conversation">

<div class="message clearfix">
<div class="chat-bubble from-me">
Hello there
</div>
</div>


<div class="message clearfix">
<div class="profile-img-wrapper m-t-5 inline">
<img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
</div>
<div class="chat-bubble from-them">
Hey
</div>
</div>


<div class="message clearfix">
<div class="chat-bubble from-me">
Did you check out Pages framework ?
</div>
</div>


<div class="message clearfix">
<div class="chat-bubble from-me">
Its an awesome chat
</div>
</div>


<div class="message clearfix">
<div class="profile-img-wrapper m-t-5 inline">
<img class="col-top" width="30" height="30" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
</div>
<div class="chat-bubble from-them">
Yea
</div>
</div>

</div>


<div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
<div class="row">
<div class="col-1 p-t-15">
<a href="#" class="link text-master"><i class="fa fa-plus-circle"></i></a>
</div>
<div class="col-8 no-padding">
<input type="text" class="form-control chat-input" data-chat-input="" data-chat-conversation="#my-conversation" placeholder="Say something">
</div>
<div class="col-2 link text-master m-l-10 m-t-15 p-l-10 b-l b-grey col-top">
<a href="#" class="link text-master"><i class="pg-camera"></i></a>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>


<!--<div class="overlay hide" data-pages="search">-->

<!--<div class="overlay-content has-results m-t-20">-->

<!--<div class="container-fluid">-->

<!--<img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">-->


<!--<a href="#" class="close-icon-light overlay-close text-black fs-16">-->
<!--<i class="pg-close"></i>-->
<!--</a>-->

<!--</div>-->

<!--<div class="container-fluid">-->

<!--<input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">-->
<!--<br>-->
<!--<div class="inline-block">-->
<!--<div class="checkbox right">-->
<!--<input id="checkboxn" type="checkbox" value="1" checked="checked">-->
<!--<label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>-->
<!--</div>-->
<!--</div>-->
<!--<div class="inline-block m-l-10">-->
<!--<p class="fs-13">Press enter to search</p>-->
<!--</div>-->

<!--</div>-->

<!--<div class="container-fluid">-->
<!--<span>-->
<!--<strong>suggestions :</strong>-->
<!--</span>-->
<!--<span id="overlay-suggestions"></span>-->
<!--<br>-->
<!--<div class="search-results m-t-40">-->
<!--<p class="bold">Pages Search Results</p>-->
<!--<div class="row">-->
<!--<div class="col-md-6">-->

<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">-->
<!--<div>-->
<!--<img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">-->
<!--</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>-->
<!--<p class="hint-text">via john smith</p>-->
<!--</div>-->
<!--</div>-->


<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">-->
<!--<div>T</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>-->
<!--<p class="hint-text">via pages</p>-->
<!--</div>-->
<!--</div>-->


<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">-->
<!--<div><i class="fa fa-headphones large-text "></i>-->
<!--</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>-->
<!--<p class="hint-text">via pagesmix</p>-->
<!--</div>-->
<!--</div>-->

<!--</div>-->
<!--<div class="col-md-6">-->

<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">-->
<!--<div><i class="fa fa-facebook large-text "></i>-->
<!--</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>-->
<!--<p class="hint-text">via facebook</p>-->
<!--</div>-->
<!--</div>-->


<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">-->
<!--<div><i class="fa fa-twitter large-text "></i>-->
<!--</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<p class="hint-text">via twitter</p>-->
<!-- </div>-->
<!--</div>-->


<!--<div class="">-->

<!--<div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">-->
<!--<div><i class="fa fa-google-plus large-text "></i>-->
<!--</div>-->
<!--</div>-->

<!--<div class="p-l-10 inline p-t-5">-->
<!--<h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>-->
<!--<p class="hint-text">via google plus</p>-->
<!--</div>-->
<!--</div>-->

<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--</div>-->

<!--</div>-->


<script src="assets/plugins/feather-icons/feather.min.js" type="text/javascript"></script>
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


<script src="pages/js/pages.min.js"></script>


<script src="assets/js/scripts.js" type="text/javascript"></script>

</body>


</html>
