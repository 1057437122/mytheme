<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php include('includes/seo.php'); ?>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_gallery.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/reslider/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/reslider/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/reslider/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/reslider/css/demo.css" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>

</head>

<body>
<div id="page">
	<div id="header">
		<div class="header-left">
		
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/blogname.png" alt="青草地">
		</a>
		
		</div>
		
			<div class="topnav">	
			<?php if(function_exists('wp_nav_menu')) { wp_nav_menu(array('theme_location'=>'top-menu','menu_id'=>'nav','container'=>'ul'));}?>
			</div>
			<div class="topcom">	
			
			</div>
		
		
		<div class="nav">		
		<?php if(function_exists('wp_nav_menu')) { wp_nav_menu(array('theme_location'=>'primary','menu_id'=>'nav','container'=>'ul'));}?>
			<div id="search">		
				<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
				<input type="text" x-webkit-speech onblur="if (this.value == '') {this.value = 'Find……';}" onfocus="if (this.value == 'Find……') {this.value = '';}" class="s" name="s" value="Find……">
				<button type="submit"><?php _e("Search"); ?></button>
				</form>
			</div>
		</div> <div class="clr"></div> 
	</div>