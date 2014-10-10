<?php
/**
 *
 * Default Page Header
 */ 
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
       <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js" type="text/javascript"></script>
    <![endif]-->


  <?php wp_head(); ?>
    
  </head>

  <body <?php body_class(); ?>>



    <!-- NAVBAR
    ================================================== -->
    <?php if ( is_front_page() ) : ?>
	    <?php if ( get_theme_mod( 'wpstrapgrid_navbar_visibility' ) == '' ) { ?>
	    	<?php get_template_part('templates/navbar'); ?>
	    <?php } ?>
	<?php else : ?>
	    
		<?php get_template_part('templates/navbar'); ?>
	<?php endif; ?>

	
	<div class="container">
	<div class="container">

	<?php if ( get_theme_mod( 'wpstrapgrid_slider_visibility' ) != 0 ) { ?>
	    <?php if ( is_front_page() ) : ?>
		    <?php get_template_part( 'slider' ); ?>
	    <?php endif; ?>
	<?php } ?>

	</div>