
<?php 
$pn = @$page['hide-nav'];
?>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title><?= $page['title'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<link rel="manifest" href="/manifest.json">
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
</head>


<body class="fixed-header horizontal-menu horizontal-app-menu dashboard">
    
    
<div class="header">
<div class="container">

<div class="header-inner justify-content-start header-lg-height title-bar">
<div class="brand inline align-self-end">
<a href="index.php">
    <img src="assets/img/logo_s.png" alt="logo" data-src="assets/img/logo_s.png" data-src-retina="assets/img/logo_s.png" width="40" height="40"></a>
</div>
<h2 class="page-title align-self-end">
brú | a complete hostel portal
</h2>


<div class="d-flex user-profile align-items-center">
<div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
<!--<span class="semi-bold">David</span> <span class="">Nest</span>-->
<?= $_SESSION['name'];?>
</div>
<div class="dropdown pull-right sm-m-r-5">
<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="thumbnail-wrapper d32 circular inline">
<!--<img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">-->
<img src="<?= $_SESSION['picture'];?>" alt="" data-src="<?= $_SESSION['picture'];?>" data-src-retina="<?= $_SESSION['picture'];?>" width="32" height="32">
</span>
</button>
<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
<!--<a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>-->
<!--<a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>-->
<a href="/help.php" class="dropdown-item"><i class="pg-signals"></i> Help</a>
<a href="/logout.php" class="clearfix bg-master-lighter dropdown-item">
<span class="pull-left">Logout</span>
<span class="pull-right"><i class="pg-power"></i></span>
</a>
</div>
</div>
</div>



</div>
<div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu">
</a>
<?php 
if($pn != 1)
    include "navigation.inc.php";
?>

</div>
</div>
</div>

<style>
.header-md-height{
    display: none!important;
}
.user-profile{
    float: right;
    position: absolute;
    right: 0px;
    margin-top: 0px;
}
</style>
