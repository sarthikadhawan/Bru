<div class="header" style="z-index: 1; height:73px;">
<div class="container">
<div class="header-inner header-md-height">
<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="horizontal-menu">
</a>
<div class="">

<ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-0 p-r-20">
<li class="p-r-10 inline">
<div class="dropdown">

<!--<a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">-->
<!--<span class="bubble"></span>-->
<!--</a>-->

<div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">

<div class="notification-panel">

<div class="notification-body scrollable">

<div class="notification-item unread clearfix">

<!--<div class="heading open">-->
<!--<a href="#" class="text-complete pull-left">-->
<!--<i class="pg-map fs-16 m-r-10"></i>-->
<!--<span class="bold">Carrot Design</span>-->
<!--<span class="fs-12 m-l-10">David Nester</span>-->
<!--</a>-->
<!--<div class="pull-right">-->
<!--<div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">-->
<!--<div><i class="fa fa-angle-left"></i>-->
<!--</div>-->
<!--</div>-->
<!--<span class=" time">few sec ago</span>-->
<!--</div>-->
<!--<div class="more-details">-->
<!--<div class="more-details-inner">-->
<!--<h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>-->
<!--distinguishes between <br>-->
<!--A leader and a follower.”</h5>-->
<!--<p class="small hint-text">-->
<!--Commented on john Smiths wall.-->
<!--<br> via pages framework.-->
<!--</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->


<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
<!--<a href="#" class="mark"></a>-->
</div>

</div>


<div class="notification-item  clearfix">
<div class="heading">
<a href="#" class="text-danger pull-left">
<i class="fa fa-exclamation-triangle m-r-10"></i>
<span class="bold">98% Server Load</span>
<span class="fs-12 m-l-10">Take Action</span>
</a>
<span class="pull-right time">2 mins ago</span>
</div>

<div class="option">
<!--<a href="#" class="mark"></a>-->
</div>

</div>


<div class="notification-item  clearfix">
<div class="heading">
<!--<a href="#" class="text-warning-dark pull-left">-->
<!--<i class="fa fa-exclamation-triangle m-r-10"></i>-->
<!--<span class="bold">Warning Notification</span>-->
<!--<span class="fs-12 m-l-10">Buy Now</span>-->
<!--</a>-->
<span class="pull-right time">yesterday</span>
</div>

<div class="option">
<a href="#" class="mark"></a>
</div>

</div>


 <div class="notification-item unread clearfix">
<div class="heading">
<div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
<img width="30" height="30" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" alt="" src="assets/img/profiles/1.jpg">
</div>
<a href="#" class="text-complete pull-left">
<span class="bold">Revox Design Labs</span>
<span class="fs-12 m-l-10">Owners</span>
</a>
<span class="pull-right time">11:00pm</span>
</div>

<div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
<a href="#" class="mark"></a>
</div>

</div>

</div>


<div class="notification-footer text-center">
<a href="#" class="">Read all notifications</a>
<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
<i class="pg-refresh_new"></i>
</a>
</div>

</div>

</div>

</div>
</li>
<li class="p-r-10 inline">
<a href="#" class="header-icon pg pg-link"></a>
<!--</li>-->
<!--<li class="p-r-10 inline">-->
<!--<a href="#" class="header-icon pg pg-thumbs"></a>-->
<!--</li>-->
</ul>

<!--<a href="#" class="search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>-->
</div>



<a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"></a>

</div>
<div class="header-inner justify-content-start header-lg-height title-bar" >
<div class="brand inline align-self-end">

</div>
<h2 class="page-title align-self-end">
<?= @$page['title'];?>
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
<a href="_payment_settings.php" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
<a href="/logout.php" class="clearfix bg-master-lighter dropdown-item">
<span class="pull-left">Logout</span>

</a>
</div>
</div>
</div>



</div>
<div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">

<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu">
</a>
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
}
div.header{
    height:44px!important;
}
</style>
