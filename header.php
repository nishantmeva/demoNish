<?php
/**
 * The Header for our theme
 * @subpackage demonishn
 * @since demonishn 1.1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    
    <?php $favicon_icon = ot_get_option( 'favicon_icon' ); 
		if(!empty($favicon_icon)) { ?>
		<link rel="icon" href="<?php echo $favicon_icon;?>" type="image/x-icon"/>
    <?php } else { ?>
		<link rel="icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico" type="image/x-icon"/>
	<?php } ?>
        
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/foundation.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/responsive.css" />
        
        <!-- bxSlider CSS file -->
        <link href="<?php echo get_template_directory_uri();?>/bxslider/jquery.bxslider.css" rel="stylesheet" />
        
    
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main" class="site-main row"><!-- end in footer-->
<div class="pagetop">

  	<header>
    	<div class="large-4 medium-4 small-12 columns">
        	<a href="<?php echo site_url();?>">
            	<?php $header_logo = ot_get_option( 'header_logo' ); 
				if (!empty($header_logo)) { ?>
					<img class="logo" src="<?php echo $header_logo?>" />
				<?php	}else { ?>
        			<img class="logo" src="<?php echo get_template_directory_uri();?>/img/logo.png" />
				
				<?php	}?>
            </a>
        </div>
        <div class="large-8 medium-8 small-12 columns">
        	<div class="menunav">
            
        	<nav class="top-bar expanded" data-topbar role="navigation">
              <ul class="title-area">
                <li class="name"></li>
                 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
              </ul>
					
           
              <section class="top-bar-section">               
                 <?php
                    $defaults = array(
                    //'theme_location'  => 'primary',                    
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s right">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                    ?>
              </section>
            </nav>
            </div><!-- end menunav-->
            
            
        </div>
    </header>  	

</div>

<!-- Content Area -->
<div class="content-area">


