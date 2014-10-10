<?php

function wpstrapgrid_customize_register($wp_customize) {
   
   // General Options
   $wp_customize->add_section( 'wpstrapgrid_general_options' , array(
    'title'      => __('General Options','wpstrapgrid'),
    'priority'   => 30,
   ) );
   // Setting group for selecting header options
   $wp_customize->add_section( 'wpstrapgrid_header_options' , array(
    'title'      => __('Header Options','wpstrapgrid'),
    'priority'   => 35,
   ) );
   
   // Setting group for selecting home page options
   $wp_customize->add_section( 'wpstrapgrid_home_options' , array(
    'title'      => __('Home Page Options','wpstrapgrid'),
    'priority'   => 37,
   ) );
   
   $wp_customize->add_section( 'wpstrapgrid_footer_options' , array(
    'title'      => __('Footer Options','wpstrapgrid'),
    'priority'   => 40,
   ) );

/**
 * Lets begin adding our own settings and controls for this theme
 * Plus organize it in sequence in each setting group with a priority level
 */
	
	// General Options Selectors
	$wp_customize->add_setting(
    'wpstrapgrid_attachment_commentform_visibility'
    );

    $wp_customize->add_control(
    'wpstrapgrid_attachment_commentform_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Comment Form on the Attachment page', 'wpstrapgrid'),
        'section' => 'wpstrapgrid_general_options',
        )
    );
	
	// =====================
    //  = Category Dropdown =
    //  =====================
    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('wpstrapgrid_slide_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'wpstrapgrid_slide_cat', array(
		'settings' => 'wpstrapgrid_slide_cat',
		'label'   => 'Select Slider Category:',
		'section'  => 'wpstrapgrid_home_options',
		'priority' => '1',
		'type'    => 'select',
		'choices' => $cats,
	));
	
	$wp_customize->add_setting(
       'wpstrapgrid_navbar_visibility'
    );

    $wp_customize->add_control(
    'wpstrapgrid_navbar_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Navbar On Home Page', 'wpatrapgrid'),
        'section' => 'wpstrapgrid_home_options',
        )
    );
	
	$wp_customize->add_setting(
    'wpstrapgrid_slider_visibility'
    );

    $wp_customize->add_control(
    'wpstrapgrid_slider_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Show Home Slider', 'wpatrapgrid'),
        'section' => 'wpstrapgrid_home_options',
        )
    );
	
	$wp_customize->add_setting( 'wpstrapgrid_slider_transition', array(
		'default' => 'slide',
	) );

	
	$wp_customize->add_control( 'wpstrapgrid_slider_transition', array(
    'label'   => __( 'Slider Transition', 'wpstrapgrid' ),
    'section' => 'wpstrapgrid_home_options',
	'priority' => '2',
    'type'    => 'radio',
        'choices' => array(
            'slide' => __( 'Slide', 'wpstrapgrid' ),
            'slide carousel-fade' => __( 'Fade', 'wpstrapgrid' ),
        ),
    ));
	
	$wp_customize->add_setting(
    'wpstrapgrid_copyright_textbox',
    array(
        'default' => 'Copyright &copy; 2013',
    ));
	
	$wp_customize->add_control(
    'wpstrapgrid_copyright_textbox',
    array(
        'label' => __('Copyright Text', 'wpatrapgrid'),
        'section' => 'wpstrapgrid_footer_options',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'wpstrapgrid_credits_visibility'
    );

    $wp_customize->add_control(
    'wpstrapgrid_credits_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Footer Credits - We understand if you must!', 'wpatrapgrid'),
        'section' => 'wpstrapgrid_footer_options',
        )
    );
	
}
add_action( 'customize_register', 'wpstrapgrid_customize_register' );