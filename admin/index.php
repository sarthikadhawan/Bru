<?php 
 session_start();
    include "inc/config.inc.php";
    include "inc/db.inc.php";
    //echo '<script> alert("'.$_SESSION['acadsession'].'")</script>';
     if(!isset($_SESSION['id']))
    header("location:/login_copy.php");
    if($_SESSION['admin'] == 1):
    
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
</head>
<body class="fixed-header dashboard menu-pin menu-behind">
	
<?php include "header.inc.php";?>
<div class="page-container ">




<div class="page-content-wrapper ">

<div class="content ">
	
	<style>
.hostel-view	td{
  height:20px;
  border:1px solid #ccc;
}
.hostel-view tr.c td{
  width:30px;
}
.hostel-view tr.a td{
  width:60px;
}
.hostel-view td{
  text-align:center;
  padding:10px;
  font-size:12px;
  font-family:Roboto;
  cursor:pointer;
}
.hostel-view td:hover{
  background:#222;
  color:#fff;
}
	</style>
	<div class="container hostel-view">
	 <div class="row">
    <div class="col-md-4">

        <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
<div class="container-xs-height full-height">
<div class="row-xs-height">
<div class="col-xs-height col-top">
<div class="card-header  top-left top-right">
<div class="card-title text-black hint-text">
<span class="font-montserrat fs-11 all-caps">Pending Applications <i class="fa fa-chevron-right"></i>
</span>
</div>
<div class="card-controls">
<ul>
<li>
<a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="row-xs-height ">
<div class="col-xs-height col-top relative">
<div class="row">
<div class="col-sm-6">
<div class="p-l-20">
 <?php
  $n= "SELECT * from request_table where status=0 ";
                                        	
                                   
                                    $received_requests_result2= mysqli_query($conn,$n);
                                    $received_requests_row_count=mysqli_num_rows($received_requests_result2);

                                  
                                     ?>
                                          <h3 class="no-margin p-b-5 text-white"><?php echo $received_requests_row_count;?></h3>
                                    <?php} ?>



<p class="small hint-text m-t-5">

</p>
</div>
</div>
<div class="col-sm-6">
</div>
</div>
<div class="widget-8-chart line-chart" data-line-color="black" data-points="true" data-point-color="warning" data-stroke-width="2">
<svg><g class="nvd3 nv-wrap nv-lineChart" transform="translate(-10,10)"><g><rect width="149" height="103" style="opacity: 0;"></rect><g class="nv-x nv-axis"></g><g class="nv-y nv-axis"></g><g class="nv-linesWrap"><g class="nvd3 nv-wrap nv-line" transform="translate(0,0)"><defs><clipPath id="nv-edge-clip-78443"><rect width="149" height="103"></rect></clipPath></defs><g clip-path=""><g class="nv-groups"><g class="nv-group nv-series-0" style="stroke-opacity: 1; fill-opacity: 0.5; fill: rgb(0, 0, 0); stroke: rgb(0, 0, 0);"><path class="nv-line" d="M0,103L24.833333333333336,75.53333333333333L49.66666666666667,34.33333333333334L74.5,27.46666666666667L99.33333333333334,0L124.16666666666667,13.733333333333334L149,68.66666666666667"></path></g></g><g class="nv-scatterWrap" clip-path=""><g class="nvd3 nv-wrap nv-scatter nv-chart-78443" transform="translate(0,0)"><defs><clipPath id="nv-edge-clip-78443"><rect width="149" height="103"></rect></clipPath></defs><g clip-path=""><g class="nv-groups"><g class="nv-group nv-series-0" style="stroke-opacity: 1; fill-opacity: 0.5; stroke: rgb(0, 0, 0); fill: rgb(0, 0, 0);"><circle cx="0" cy="103" r="3" class="nv-point nv-point-0" style="stroke-width: 2px;"></circle><circle cx="24.833333333333336" cy="75.53333333333333" r="3" class="nv-point nv-point-1" style="stroke-width: 2px;"></circle><circle cx="49.66666666666667" cy="34.33333333333334" r="3" class="nv-point nv-point-2" style="stroke-width: 2px;"></circle><circle cx="74.5" cy="27.46666666666667" r="3" class="nv-point nv-point-3" style="stroke-width: 2px;"></circle><circle cx="99.33333333333334" cy="0" r="3" class="nv-point nv-point-4" style="stroke-width: 2px;"></circle><circle cx="124.16666666666667" cy="13.733333333333334" r="3" class="nv-point nv-point-5" style="stroke-width: 2px;"></circle><circle cx="149" cy="68.66666666666667" r="3" class="nv-point nv-point-6" style="stroke-width: 2px;"></circle></g></g><g class="nv-point-paths"></g></g></g></g></g></g></g><g class="nv-legendWrap"></g><g class="nv-interactive"></g></g></g></svg>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="widget-9 card no-border bg-success no-margin widget-loader-bar">
<div class="full-height d-flex flex-column">
<div class="card-header ">
<div class="card-title text-black">
<span class="font-montserrat fs-11 all-caps">Vacant Rooms <i class="fa fa-chevron-right"></i>
</span>
</div>
<div class="card-controls">
<ul>
<li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
</li>
</ul>
</div>
</div>
<div class="p-l-20">
 <?php
  $n= "SELECT * from room where status=0 and temp_status=0";
                                        	
                                    $received_requests_result2= mysqli_query($conn,$n);
                                    $received_requests_row_count=mysqli_num_rows($received_requests_result2);
                                    ?>                   <h3 class="no-margin p-b-5 text-white"><?php echo $received_requests_row_count;?></h3>

</div>
<div class="mt-auto">
<div class="progress progress-small m-b-20">

<div class="progress-bar progress-bar-white" style="width:45%"></div>

</div>
</div>
</div>
</div>
</div>








<div class="col-md-4">
<div class="widget-10 card no-border no-margin widget-loader-bar" style="background:#dd77ac">
<div class="full-height d-flex flex-column">
<div class="card-header ">
<div class="card-title text-black">
<span class="font-montserrat fs-11 all-caps">Current Session <i class="fa fa-chevron-right"></i>
</span>
</div>
<div class="card-controls">
<ul>
<li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
</li>
</ul>
</div>
</div>
<div class="p-l-20">
<h3 class="no-margin p-b-5 text-white"><?php echo explode('_', $_SESSION['acadsession'])[1];?></h3>
<a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
</a>
<span class="small hint-text text-white"><?php echo explode('_', $_SESSION['acadsession'])[0];?></span>
</div>
<div class="mt-auto">
<div class="progress progress-small m-b-20">

<div class="progress-bar progress-bar-white" style="width:45%"></div>

</div>
</div>
</div>
</div>
</div>





 </div>
		<h1 style="background-color: #00A0B0; color:white; font-family: 'Montserrat';">Hostel View</h1>	
		<div class="card-header"> 
		<h2 style="background-color: #01b6c6; color:white; font-family: 'Montserrat';" class="btn_boys_hostel" >Boys Hostel</h2>

		
		</div>
		<div id="boys_hostel" style="background-color:white;display:none;">
		<table class="floor" data-floor="1">
  <tr class="a">
    <td>A</td>
      
     <td colspan=2 data-room-id="1"></td>

    
     <td colspan=2 data-room-id="2"></td>

    
     <td colspan=2 data-room-id="3"></td>

    
     <td colspan=2 data-room-id="4"></td>

    
     <td colspan=2 data-room-id="5"></td>

    
     <td colspan=2 data-room-id="6"></td>

    
     <td colspan=2 data-room-id="7"></td>

    
     <td colspan=2 data-room-id="8"></td>

    
     <td colspan=2 data-room-id="9"></td>

    
     <td colspan=2 data-room-id="10"></td>

    
     <td colspan=2 data-room-id="11"></td>

    
     <td colspan=2 data-room-id="12"></td>

  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    
<td data-room-id="107"></td>
<td data-room-id="108"></td>
<td data-room-id="109"></td>
<td data-room-id="110"></td>
<td data-room-id="111"></td>
<td data-room-id="112"></td>
<td data-room-id="113"></td>
<td data-room-id="114"></td>
<td data-room-id="115"></td>
<td data-room-id="116"></td>
<td data-room-id="117"></td>
<td data-room-id="118"></td>
<td data-room-id="119"></td>
<td data-room-id="120"></td>
<td data-room-id="121"></td>
<td data-room-id="122"></td>
<td data-room-id="123"></td>
<td data-room-id="124"></td>
<td data-room-id="125"></td>
<td data-room-id="126"></td>
<td data-room-id="127"></td>
<td data-room-id="128"></td>
<td data-room-id="129"></td>
<td data-room-id="130"></td>
  </tr>
</table>

<table class="floor" data-floor="2">
  <tr class="a">
    <td>A</td>
     
<td colspan=2 data-room-id="13"></td>
<td colspan=2 data-room-id="14"></td>
<td colspan=2 data-room-id="15"></td>
<td colspan=2 data-room-id="16"></td>
<td colspan=2 data-room-id="17"></td>
<td colspan=2 data-room-id="18"></td>
<td colspan=2 data-room-id="19"></td>
<td colspan=2 data-room-id="20"></td>
<td colspan=2 data-room-id="21"></td>
<td colspan=2 data-room-id="22"></td>
<td colspan=2 data-room-id="23"></td>
<td colspan=2 data-room-id="24"></td>
  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    <td>C</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
  </tr>
</table>



<table class="floor" data-floor="3">
  <tr class="a">
    <td>A</td>
     <td colspan=2 data-room-id="25"></td>
<td colspan=2 data-room-id="26"></td>
<td colspan=2 data-room-id="27"></td>
<td colspan=2 data-room-id="28"></td>
<td colspan=2 data-room-id="29"></td>
<td colspan=2 data-room-id="30"></td>
<td colspan=2 data-room-id="31"></td>
<td colspan=2 data-room-id="32"></td>
<td colspan=2 data-room-id="33"></td>
<td colspan=2 data-room-id="34"></td>
<td colspan=2 data-room-id="35"></td>
<td colspan=2 data-room-id="36"></td>
  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    <td>C</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
  </tr>
</table>

<table class="floor" data-floor="4">
  <tr class="a">
    <td>A</td>
     
<td colspan=2 data-room-id="37"></td>
<td colspan=2 data-room-id="38"></td>
<td colspan=2 data-room-id="39"></td>
<td colspan=2 data-room-id="40"></td>
<td colspan=2 data-room-id="41"></td>
<td colspan=2 data-room-id="42"></td>
<td colspan=2 data-room-id="43"></td>
<td colspan=2 data-room-id="44"></td>
<td colspan=2 data-room-id="45"></td>
<td colspan=2 data-room-id="46"></td>
<td colspan=2 data-room-id="47"></td>
<td colspan=2 data-room-id="48"></td>

  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    <td>C</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
  </tr>
</table>

<table class="floor" data-floor="5">
  <tr class="a">
    <td>A</td>
     
<td colspan=2 data-room-id="49"></td>
<td colspan=2 data-room-id="50"></td>
<td colspan=2 data-room-id="51"></td>
<td colspan=2 data-room-id="52"></td>
<td colspan=2 data-room-id="53"></td>
<td colspan=2 data-room-id="54"></td>
<td colspan=2 data-room-id="55"></td>
<td colspan=2 data-room-id="56"></td>
<td colspan=2 data-room-id="57"></td>
<td colspan=2 data-room-id="58"></td>
<td colspan=2 data-room-id="59"></td>
<td colspan=2 data-room-id="60"></td>
  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    <td>C</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
  </tr>
</table>

<table class="floor" data-floor="6">
  <tr class="a">
    <td>A</td>
    
<td colspan=2 data-room-id="61"></td>
<td colspan=2 data-room-id="62"></td>
<td colspan=2 data-room-id="63"></td>
<td colspan=2 data-room-id="64"></td>
<td colspan=2 data-room-id="65"></td>
<td colspan=2 data-room-id="66"></td>
<td colspan=2 data-room-id="67"></td>
<td colspan=2 data-room-id="68"></td>
<td colspan=2 data-room-id="69"></td>
<td colspan=2 data-room-id="70"></td>
<td colspan=2 data-room-id="71"></td>
<td colspan=2 data-room-id="72"></td>
  </tr>
  <tr class="b">
    <td>B</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    
     <td></td>
     <td></td>
    <td colspan="12">EMPTY</td>
  </tr>
  <tr class="c">
    <td>C</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    <td></td>
     <td></td>
  </tr>
</table>
</div>

	</div>

</div>
</div>
<?php include '_sidebar.php';?>


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
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/plugins/skycons/skycons.js" type="text/javascript"></script>


<script src="pages/js/pages.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/dashboard.js" type="text/javascript"></script>
<script src="assets/js/scripts.js" type="text/javascript"></script>

<script src="assets/js/demo.js" type="text/javascript"></script>
<script>
		 window.intercomSettings = {
		   app_id: "xt5z6ibr"
		 };
		</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/xt5z6ibr';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
<script type="text/javascript">
	$(document).ready(function(){
  $(".floor").each(function(){
     fc = $(this).attr("data-floor");
     $(this).find("tr.a td").each(function(k,v){
       if(k!=0)
        $(this).html(fc*100 + k);
     });
    
    if(fc <= 4){
      $(this).find("tr.b td").each(function(k,v){
       if(k!=0 && k!=13)
        $(this).html(fc*100 + k);
        
     });
      
    }
    $(this).find("tr.c td").each(function(k,v){
       if(k!=0)
        $(this).html(fc*100 + k);
     })
    
  });
  
});
</script>
mysqli_close($conn);
</body>
</html>
<?php
else:
    echo "Not Logged In";
endif;

?>
 		<script>
		$(".btn_boys_hostel").click(function(){
		 $("#boys_hostel").slideToggle();
		});
		</script>