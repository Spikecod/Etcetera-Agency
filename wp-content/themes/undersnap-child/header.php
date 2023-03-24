<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<base href="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/undersnap-child/">

<link rel="icon" href="assets/img/favicon.png" type="image/jpg" />

<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<link href="assets/css/fontawesome.min.css" rel="stylesheet">

<link href="assets/css/magnific-popup.min.css" rel="stylesheet">

<link href="assets/css/animate.css" rel="stylesheet">

<link href="assets/css/barfiller.css" rel="stylesheet">

<link href="assets/css/owl.carousel.css" rel="stylesheet">

<link href="assets/css/style.css" rel="stylesheet">

<link href="assets/css/responsive.css" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body>

<header class="header-area">
<div class="sticky-area">
<div class="navigation">
<div class="container">
<div class="row">
<div class="col-lg-2">
<div class="logo">
<a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt></a>
</div>
</div>
<div class="col-lg-9">
<div class="main-menu">
<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="navbar-toggler-icon"></span>
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'primary-menu',
   'menu_class' => 'navbar-nav',
  
  ) );
  ?>
</div>
</nav>    
   
</div>
</div>
<div class="col-lg-1">

</div>
</div>
</div>
</div>
</div>
    
</header>
       
<div class="breadcroumb-area bread-bg" style="background-image: url(assets/img/new/header_pic.jpg);">
<div class="container">
<div class="row">
<div class="col-lg-12"> 
<div class="breadcroumb-title">
<?php
if ( is_404() ) {
    echo '<h1>Page Not Found</h1>';
} else {
    echo '<h1>' . get_the_title() . '</h1>';
   ?> 
  <h6>
    <?php   mytheme_breadcrumbs(); ?>
</h6>  
<?php
}
?>    

</div>
</div>
</div>
</div>
</div>