<?php
/**
 * Expert Mechanic: Customizer
 *
 * @subpackage Expert Mechanic
 * @since 1.0
 */

use WPTRT\Customize\Section\Expert_Mechanic_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Expert_Mechanic_Button::class );

	$manager->add_section(
		new Expert_Mechanic_Button( $manager, 'expert_mechanic_pro', [
			'title'       => __( 'Expert Mechanic Pro', 'expert-mechanic' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'expert-mechanic' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/mechanic-wordpress-theme/', 'expert-mechanic')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-mechanic-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'expert-mechanic-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function expert_mechanic_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'expert_mechanic_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'expert-mechanic' ),
	    'description' => __( 'Description of what this panel does.', 'expert-mechanic' ),
	) );

	$wp_customize->add_section( 'expert_mechanic_theme_options_section', array(
    	'title'      => __( 'General Settings', 'expert-mechanic' ),
		'priority'   => 30,
		'panel' => 'expert_mechanic_panel_id'
	) );

	$wp_customize->add_setting('expert_mechanic_theme_options',array(
        'default' => __('Right Sidebar','expert-mechanic'),
        'sanitize_callback' => 'expert_mechanic_sanitize_choices'	        
	));
	$wp_customize->add_control('expert_mechanic_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','expert-mechanic'),
        'section' => 'expert_mechanic_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','expert-mechanic'),
            'Right Sidebar' => __('Right Sidebar','expert-mechanic'),
            'One Column' => __('One Column','expert-mechanic'),
            'Three Columns' => __('Three Columns','expert-mechanic'),
            'Four Columns' => __('Four Columns','expert-mechanic'),
            'Grid Layout' => __('Grid Layout','expert-mechanic')
        ),
	));

	//Topbar section
	$wp_customize->add_section( 'expert_mechanic_topbar_section' , array(
    	'title'      => __( 'Topbar Section', 'expert-mechanic' ),
		'priority'   => null,
		'panel' => 'expert_mechanic_panel_id'
	) );

	$wp_customize->add_setting('expert_mechanic_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'expert_mechanic_sanitize_email'
	));	
	$wp_customize->add_control('expert_mechanic_email',array(
		'label'	=> __('Email','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('expert_mechanic_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'expert_mechanic_sanitize_phone_number'
	));	
	$wp_customize->add_control('expert_mechanic_call',array(
		'label'	=> __('Phone No.','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('expert_mechanic_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_facebook',array(
		'label'	=> __('Add Facebook Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_twitter',array(
		'label'	=> __('Add Twitter Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_pinterest',array(
		'label'	=> __('Add Pinterest Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_instagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_instagram',array(
		'label'	=> __('Add Instagram Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_youtube',array(
		'label'	=> __('Add Youtube Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_linkedin',array(
		'label'	=> __('Add Linkedin Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('expert_mechanic_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_mechanic_button_text',array(
		'label'	=> __('Add Button Text','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('expert_mechanic_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_mechanic_button_link',array(
		'label'	=> __('Add Button Link','expert-mechanic'),
		'section'	=> 'expert_mechanic_topbar_section',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'expert_mechanic_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'expert-mechanic' ),
		'priority'   => null,
		'panel' => 'expert_mechanic_panel_id'
	) );

	$wp_customize->add_setting('expert_mechanic_slider_hide_show',array(
       	'default' => 'true',
       	'sanitize_callback'	=> 'expert_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_mechanic_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','expert-mechanic'),
	   	'section' => 'expert_mechanic_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'expert_mechanic_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'expert_mechanic_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'expert_mechanic_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'expert-mechanic' ),
			'section' => 'expert_mechanic_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	// Our Expertise 
	$wp_customize->add_section('expert_mechanic_services_section',array(
		'title'	=> __('Our Expertise','expert-mechanic'),
		'description'=> __('This section will appear below the Slider section.','expert-mechanic'),
		'panel' => 'expert_mechanic_panel_id',
	));
	
	$wp_customize->add_setting('expert_mechanic_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_mechanic_services_title',array(
		'label'	=> __('Section Title','expert-mechanic'),
		'section'	=> 'expert_mechanic_services_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst4[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst4[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('expert_mechanic_services_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'expert_mechanic_sanitize_select',
	));
	$wp_customize->add_control('expert_mechanic_services_cat',array(
		'type'    => 'select',
		'choices' => $cat_pst4,
		'label' => __('Select Category to display Services Posts','expert-mechanic'),
		'section' => 'expert_mechanic_services_section',
	));

	//Footer
    $wp_customize->add_section( 'expert_mechanic_footer', array(
    	'title'      => __( 'Footer Text', 'expert-mechanic' ),
		'priority'   => null,
		'panel' => 'expert_mechanic_panel_id'
	) );

    $wp_customize->add_setting('expert_mechanic_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_mechanic_footer_copy',array(
		'label'	=> __('Footer Text','expert-mechanic'),
		'section'	=> 'expert_mechanic_footer',
		'setting'	=> 'expert_mechanic_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'expert_mechanic_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'expert_mechanic_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'expert_mechanic_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'expert_mechanic_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'expert-mechanic' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'expert-mechanic' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'expert_mechanic_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'expert_mechanic_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'expert_mechanic_customize_register' );

function expert_mechanic_customize_partial_blogname() {
	bloginfo( 'name' );
}

function expert_mechanic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function expert_mechanic_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function expert_mechanic_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}