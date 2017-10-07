<!DOCTYPE html>
<html lang="en">
<?
include("config.php");
include("classes/admin.php");
include("classes/Items.php");
include("classes/orders.php");
include("classes/users.php");
include("classes/comments.php");
include("classes/pages.php");
include("classes/siteinfo.php");
$Pages_obj = new Pages;
$Siteinfo_obj = new Siteinfo;
$Users_obj = new Users;
$Orders_obj = new Orders;
$Admin_obj = new Admin;
$Items_obj = new Items;
$Comments_obj = new Comments;
$Siteinfo = $Siteinfo_obj->getData();
$checker = $Admin_obj->check();

if(isset($_GET['logout'])){
	$Admin_obj->logout();
}

if($checker=='unloginned'){
	header("Location: login.php");
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><? echo $Siteinfo['sitename']; ?> Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=xtpxy38lozrraw1fe1g5257m65utmmq8klzefqb3aksr71x2"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><? echo $Siteinfo['sitename']; ?> Shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?logout=1"><i class="fa fa-sign-out fa-fw"></i> Вийти</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Огляд</a>
                        </li>
                        <li>
                            <a href="items.php"><i class="fa fa-shopping-cart fa-fw"></i> Товари</a>
                        </li>
						<li>
                            <a href="categories.php"><i class="fa fa-table fa-fw"></i> Категорії</a>
                        </li>
						<li>
                            <a href="orders.php"><i class="fa fa-shopping-bag fa-fw"></i> Замовлення</a>
                        </li>
						<li>
                            <a href="users.php"><i class="fa fa-user fa-fw"></i> Користувачі</a>
                        </li>
						<li>
                            <a href="comments.php"><i class="fa fa-comments fa-fw"></i> Коментарі</a>
                        </li>
						<li>
                            <a href="siteinfo.php"><i class="fa fa-sitemap fa-fw"></i> Редагування сайту</a>
                        </li>
						<li>
                            <a href="pages.php"><i class="fa fa-file fa-fw"></i> Сторінки</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav> 