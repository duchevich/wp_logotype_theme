<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LogoType</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <?php wp_head(); ?>

</head>
<body>
	<nav class="navbar navbar-fixed-top shadow-border-bottom">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo-h2 hidden-lg hidden-md hidden-sm" href="#"><?php echo get_option('logo'); ?></a>
			</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php wp_nav_menu( array('theme_location' => 'top', 'menu_class' => 'nav navbar-nav navbar-left' )); ?>
			<div class="navbar-right hidden-xs">
				<p><a href="tel:+7<?php echo preg_replace('/[^0-9]/', '', get_option('tel')); ?>">Тел. <?php echo get_option('tel') ?></a></p>
			</div>
		</div>
		</div>
	</nav>
	<header>
	   <div class="container">
		  <div class="row">
			  <div class="col-xs-6 col-md-6">
				<div class="header-logo">
					<a href="#" class="logo-a"><h2 class="logo-h2 hidden-xs"><?php echo get_option('logo'); ?></h2></a>
				</div> 
			  </div>
			  <div class="col-xs-6 col-md-6">
				<div class="header-phone">
					<p>Тел. <?php echo get_option('tel') ?></p>
					<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">Закажите звонок</a>
				</div>    
			  </div>
		  </div>
	   </div>
	</header>