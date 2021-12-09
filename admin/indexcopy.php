<?php 
session_start();
if(!isset($_SESSION['id']))
 header("location:/login_copy.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> brú - Dashboard</title>
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
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />

 <link href="../../assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/global-plugins.min.css" rel="stylesheet" />
        <link href="../../assets/vendors/jquery-icheck/skins/all.css" rel="stylesheet" />
        <link href="../../assets/vendors/navgoco/jquery.navgoco.min.css" rel="stylesheet"  type="text/css" media="screen" />
        <link href="../../assets/vendors/nanoscroller/css/nanoscroller.min.css" rel="stylesheet"  type="text/css" />
        <link href="../../assets/vendors/animsition/css/animsition.min.css" rel="stylesheet" />
        <link href="../../assets/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet" />
        <link href="../../assets/vendors/owl-carousel/owl.transitions.min.css" rel="stylesheet" />
        <!-- BUTTON PLUGINS -->
        <link href="../../assets/vendors/rippler/dist/css/rippler.min.css" rel="stylesheet" />
        <!-- ICON FONTS -->
        <link href="../../assets/vendors/linearicons/style.min.css" rel="stylesheet">
        <!-- SKY FORM CSS PLUGINS-->
        <link href="../../assets/vendors/skyforms/css/sky-forms.min.css" rel="stylesheet">
           /*================================-->
        <link href="../../assets/css/theme.min.css" rel="stylesheet">
        <!--================================/
        /* END THEME STYLE
        /*================================-->


        <!--================================/
        /* START STYLE FOR THIS PAGE ONLY
        /*================================-->
        <link href="../../assets/css/pages/echarts.css" rel="stylesheet">
        <link href="../../assets/css/pages/widgets.css" rel="stylesheet">
        <!--================================/
        /* END STYLE FOR THIS PAGE ONLY
        /*================================-->


        <!--================================/
        /* START THEME COLOR
        /*================================-->
        <link class="css-theme-color-file" href="../../assets/css/colors/light-cyan.css" rel="stylesheet">
        <!--================================/
        /* END THEME COLOR
        /*================================-->


        <!--================================/
        /* START CUSTOM STYLES
        /*================================-->
        <link href="../../assets/css/custom.css" rel="stylesheet">
        <!--================================/
       
</head>
<body class="fixed-header dashboard menu-pin menu-behind">

<?php include "_sidebar.php";?>

<?php include "header.inc.php";?>


<div class="page-container ">
<div class="page-content-wrapper ">
<div class="content ">
	
<div class="jumbotron" data-pages="parallax">
<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
<div class="inner">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="#">Requests</a></li>
<li class="breadcrumb-item active">Recieved Requests</li>
</ol>
</div>
</div>
</div>

<div class="container-fluid">
<div class"row" >
	 <div class="col-lg-3 col-sm-6 ">
                                <div class="counter-widget variant-1 color-1">
                                    <div class="counter-icon">
                                        <div class="front-content">
                                            <i class="icon icon-binoculars"></i>
                                            <span class="total">78, 921</span>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (success)</span>
                                                    <div class="ui-progressbar-value ui-widget-header ui-corner-left" style="display: none; width: 0%;"></div></div>
                                            </div>
                                            <p>Page Views</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
</div>
</div>
</div>
</div>
</div>
<div class=" container-fluid  container-fixed-lg footer">
<div class="copyright sm-text-center">
<p class="small no-margin pull-left sm-pull-reset">
</p>

<div class="clearfix"></div>
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
<script src="assets/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/utils.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/line.js" type="text/javascript"></script>
<script src="assets/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
<script src="assets/plugins/mapplic/js/hammer.js"></script>
<script src="assets/plugins/mapplic/js/jquery.mousewheel.js"></script>
<script src="assets/plugins/mapplic/js/mapplic.js"></script>
<script src="assets/plugins/rickshaw/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>


<script src="pages/js/pages.min.js"></script>


<script src="assets/js/dashboard.js" type="text/javascript"></script>
<script src="assets/js/scripts.js" type="text/javascript"></script>

<script src="assets/js/demo.js" type="text/javascript"></script>
<script>
		 window.intercomSettings = {
		   app_id: "xt5z6ibr"
		 };
		</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/xt5z6ibr';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
</body>
</html>