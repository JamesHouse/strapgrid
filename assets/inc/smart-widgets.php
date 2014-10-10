<?php

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function wpstrapgrid_widgets_init() {

  register_sidebar( array(
    'name' => __('Home Intro', 'wpatrapgrid'),
    'id' => 'wpstrapgrid-home-intro',
	'description'   => __('This widget appears at the top of the home page only - just below the slider. Use to add an introduction to your site or a call to action. It accepts shortcode and I recommend using the Black Studio TinyMCE plugin for better content entry.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ) );
  
  register_sidebar(array(
    'name' => __('Top Left - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-top-left',
    'description'   => __('Left Top Widget - part of three widgets that appear in the top and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Top Middle Left - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-top-middlel',
    'description'   => __('Middle Top Widget - part of three widgets that appear in the top and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Top Middle Right - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-top-middler',
    'description'   => __('Right Top Widget - part of three widgets that appear in the top and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));
  register_sidebar(array(
    'name' => __('Top Right - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-top-right',
    'description'   => __('Right Top Widget - part of three widgets that appear in the top and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));
    
  register_sidebar( array(
    'name' => __('Page Sidebar', 'wpatrapgrid'),
    'id' => 'wpstrapgrid-sidebar-page',
	'description'   => __('This sidebar appears on pages only. Accepts shortcode.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
  
  register_sidebar( array(
    'name' => __('Posts Sidebar', 'wpatrapgrid'),
    'id' => 'wpstrapgrid-sidebar-posts',
	'description'   => __('This sidebar appears on single.php - the individual post page. Accepts shortcode.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
   
  register_sidebar(array(
    'name' => __('Footer Left - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-footer-left',
    'description'   => __('Left Footer Widget - part of three widgets that appear in the footer and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Footer Middle Left - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-footer-middlel',
    'description'   => __('Middle Footer Widget - part of three widgets that appear in the footer and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Footer Middle Right - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-footer-middler',
    'description'   => __('Right Footer Widget - part of three widgets that appear in the footer and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));
  register_sidebar(array(
    'name' => __('Footer Right - One Third', 'wpatrapgrid'),
    'id'   => 'wpstrapgrid-footer-right',
    'description'   => __('Right Footer Widget - part of three widgets that appear in the footer and are sitewide.', 'wpatrapgrid'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

}
add_action( 'widgets_init', 'wpstrapgrid_widgets_init' );

add_filter('widget_text', 'do_shortcode');
add_filter('wp_editor', 'do_shortcode');
add_filter('header_content', 'do_shortcode');