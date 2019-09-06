<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$meta = $user->meta_show();
$latest_blog = $user->latest_blog();
$recent_three_member = $user->get_recent_three_user();
$block_show = $user->block_show();
$block_show['block_active'];
  //echo $_SERVER['PHP_SELF']; 

if($_SERVER['PHP_SELF'] == '/index.php'){
    $metakey = 'index meta';
    $metadesc = 'index meta metadesc';
}
if($_SERVER['PHP_SELF'] == '/profile'){
    $metakey = 'index meta';
    $metadesc = 'index meta metadesc';
}
if($_SERVER['PHP_SELF'] == '/settings'){
    $metakey = 'index meta';
    $metadesc = 'index meta metadesc';
}
if($_SERVER['PHP_SELF'] == '/share'){
    $metakey = 'index meta';
    $metadesc = 'index meta metadesc';
}
if($_SERVER['PHP_SELF'] == '/kikgirl'){
    $metakey = 'kikgirl meta';
    $metadesc = 'kikgirl meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/kikguys'){
    $metakey = 'kikguys meta';
    $metadesc = 'kikguys meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/hotornot'){
    $metakey = 'hotornot meta';
    $metadesc = 'hotornot meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/hotestusers'){
    $metakey = 'hotestusers meta';
    $metadesc = 'hotestusers meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/search'){
    $metakey = 'search meta';
    $metadesc = 'search meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/login'){
    $metakey = 'login meta';
    $metadesc = 'login meta metadesc';
}
else if($_SERVER['PHP_SELF'] == '/registration'){
    $metakey = 'registration meta';
    $metadesc = 'registration meta metadesc';
}
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <title>Find Kik User</title>

        <meta name="keywords" content="<?php if(isset($blog['metakey'])){echo $blog['metakey'];}else{echo $metakey;}?>" />
        <meta name="description" content="<?php if(isset($blog['metadescription'])){echo $blog['metadescription'];}else{ echo $metadesc;} ?>" />
        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <link rel="icon" type="image/png" href="img/fav-icon.png" />   
        <script src="<?php echo $base_url ?>/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
        <!-- CORE CSS -->
        <link href="<?php echo $base_url ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- PAGE LEVEL SCRIPTS -->
        <link href="<?php echo $base_url ?>/assets/css/header-1.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url ?>/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
        <!-- SWIE SLIDER -->
        <link href="<?php echo $base_url ?>/assets/plugins/slider.swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom CSS -->
        <link href="<?php echo $base_url ?>/assets/css/essentials.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url ?>/assets/css/layout.css" rel="stylesheet" type="text/css" />
        <script>
            var baseurl='<?php echo $base_url ?>';
        </script>
    </head>
    <body class="smoothscroll enable-animation">
        <!-- wrapper -->
    <div id="wrapper">
		<?php if($_SERVER['PHP_SELF'] == '/index.php'){ ?>
			<div id="header" class="sticky header-sm transparent noborder clearfix">
		<?php }else{?>
			<div id="header" class="sticky rs_nav_color header-sm  clearfix">
		<?php } ?>
                <!-- TOP NAV -->
            <header id="topNav">
                 <div class="container"> 
                        <!-- Mobile Menu Button -->
                        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                         <!-- BUTTONS -->
                         
                             <!-- SEARCH -->

                                 <a class="logo pull-left" href="<?php echo $base_url ?>">
                                      <img src="<?php echo $base_url ?>/assets/images/kiklogo.png" alt="" />
                                </a>
                       <?php include 'nav.php'; ?>
                 </div>
          </header>
       </div>

