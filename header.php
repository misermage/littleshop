<!DOCTYPE html>

<?
include('admin/config.php');
include('classes/Items.php');
include('classes/Users.php');
include('classes/Comments.php');
include('classes/Pages.php');
$Pages_obj = new Pages;
$Items_obj = new Items;
$User_obj = new Users;
$Comments_obj = new Comments;
$checker = $User_obj->check();
if($checker != 'unloginned'){
	$userData = $User_obj->getUserDataById($_COOKIE['id']);
}
if(isset($_GET['logout'])){
	$User_obj->logout();
}
$Sitedata = $Items_obj->getSiteData();
?>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title><? echo $Sitedata['sitename']; ?></title>
	<meta name="description" content="UPTAKE2 - responsive magazine HTML template by entiri">
	<meta name="keywords" content="UPTAKE2, entiri, theme, template, store, eshop, shop, unique, multipurpose, sliders, corporate, clean, modern, bootstrap, creative, design">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--[if (gte IE 9)|!(IE)]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <![endif]--> 

  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" type="image/png">

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  
  <!-- Styles -->
  <link href="css/styles.css" rel="stylesheet" id="color-style"> 

  <!-- Magnific Popup -->
  <link href="css/magnific-popup.css" rel="stylesheet"> 

  <!-- Animate -->    
  <link href="css/animate.css" rel="stylesheet">

  <!-- Font Awesome Style -->
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <!-- Typicons Style -->
  <link href="css/typicons.min.css" rel="stylesheet">
	 
	<!-- Flex Slider -->
	<link href="css/flexslider.css" media="screen" rel="stylesheet">

  <!-- Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->   

	<script src="js/modernizr.js"></script>
</head>       
<body>

  <!-- Header -->
  <header> 

    <!-- Top Bar 
    <div class="top-bar">
      <div class="container">
        <div class="row"> 
          <div class="col-md-12">

            <div class="currencies">         
              
              <a href="#" class="currency-sign">$</a>
              <a href="#" class="currency-sign">€</a>
              <a href="#" class="currency-sign">?</a>
						  
            </div> 

            <div class="social">
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-dropbox"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-youtube"></i></a>
            </div> 
            
          </div>
        </div>    
      </div>  
    </div>
     Top Bar End -->
    
    <!-- Logo Bar -->
    <div class="logo-bar">
      <div class="container">
        <div class="row"> 
          <div class="col-md-4 col-sm-4">
            <!-- Logo -->                       
        		<a href="index.php" class="logo" title="Home"><img src="<? echo $Sitedata['siteimg']; ?>" alt=""></a> 
          </div>
		  
          <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">

            <!-- Search Input 
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search here">
              <span class="input-group-btn">
                <button class="btn" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
			-->
          </div>
          <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">

            <!-- Shopping Cart Input -->
            <div class="input-group">
              <input type="text" class="form-control" placeholder="No items" style="visibility:hidden">
              <span class="input-group-btn">
					<button class="btn" type="button" onclick="window.location.href='checkout.php'"><i class="fa fa-shopping-cart"></i>
					</button>
              </span>
            </div>

          </div>
        </div>    
      </div>
    </div>  
    <!-- Logo Bar End -->

    <!-- Nav -->
    <nav class="navbar" role="navigation">
      <div class="navbar-inner">
        <div class="container"> 
                         
          <!-- Menu -->
          <ul class="nav navbar-nav" id="nav">
            <li><a href="index.php" title="">Головна</a></li>
            <li><a href="shop.php" title="">Магазин</a>
              <!-- Submenu -->
              <ul>
                <li><a href="product-list.php?cat=0&page=0" title="">Категорії</a></li>  
              </ul>
              <!-- Submenu End --> 
            </li>
            <li><a href="contact.php" title="">Контакти</a></li>             
            <li><a href="my-account.php" title=""><? if($checker=='unloginned'){ ?>Авторизація<? }else{ ?><? echo $userData['username']; ?><? } ?></a></li>           
          </ul>
          <!-- Menu End -->     
          
        </div> 
      </div>  
    </nav>
    <!-- Nav End -->

  </header>
