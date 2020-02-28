<?php

//* Start the engine
include_once(get_template_directory() . '/lib/init.php');
require_once 'lib/tgm.php';

//* Setup Theme

//* Set Localization (do not remove)
load_child_theme_textdomain('entrenamiento',
	apply_filters('child_theme_textdomain', get_stylesheet_directory() . '/languages', 'entrenamiento'));


	// Adds image sizes.
	add_image_size( 'sidebar-featured', 75, 75, true );
	add_image_size( 'big-featured', 750, 380, array('left', 'top') );
	add_image_size( 'main-featured', 600, 300, array('left', 'top') );
	add_image_size( 'search-featured', 350, 250, array('left', 'top') );
	add_image_size( 'cat-big-featured', 540, 510, array('left', 'top') );
	add_image_size( 'cat-item-featured', 260, 130, array('left', 'top') );

	add_theme_support( 'genesis-footer-widgets', 3 );
	//* Add support for custom header
	// Add support for custom logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 600,
		'height'      => 160,
		'flex-width' => true,
		'flex-height' => true,
	) );

	// Removes header right widget area.
	unregister_sidebar( 'header-right' );
	// Removes secondary sidebar.
	unregister_sidebar( 'sidebar-alt' );
	unregister_sidebar( 'sidebar' );
	// Removes site layouts.
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	// header section
	require_once 'lib/header-structure.php';
	require_once 'lib/footer-functions.php';
	require_once 'lib/customize.php';
	require_once 'lib/entrenamiento_widgets.php';



	//* menu section
	require_once 'lib/additional-menu.php';




add_action( 'wp_enqueue_scripts', 'entrenamiento_enqueue_script' );
function entrenamiento_enqueue_script() {
    wp_enqueue_style("normalize", get_stylesheet_directory_uri() ."/assets/css/normalize.css", null);
    wp_enqueue_style("bootstrap", get_stylesheet_directory_uri()   ."/assets/css/bootstrap.min.css", null );
    wp_enqueue_style("font-awesome", "//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", null);
    wp_enqueue_style("main", get_stylesheet_directory_uri() . "/assets/css/main.css", null);

    wp_enqueue_script("modernizr", get_stylesheet_directory_uri() ."/assets/js/vendor/modernizr-3.7.1.min.js", null, "1.0", true );
    wp_enqueue_script("slidereveal", get_stylesheet_directory_uri() ."/assets/js/jquery.slidereveal.min.js", array('jquery'), "1.0", true );
    wp_enqueue_script("bootstrap", get_stylesheet_directory_uri() ."/assets/js/bootstrap.min.js", array('jquery'), "1.0", true );
    wp_enqueue_script("infinity_js", get_stylesheet_directory_uri() ."/assets/js/infinity-scroll.js", array('jquery'), "1.0", true );
	if(is_home() || is_category()|| is_author()){
		wp_enqueue_script("home-inf_js", get_stylesheet_directory_uri() ."/assets/js/home-infinity.js", array('jquery'), "1.0", true );
	}
	if(is_search()){
		wp_enqueue_script("search-inf_js", get_stylesheet_directory_uri() ."/assets/js/search-infinity.js", array('jquery'), "1.0", true );
	}


    wp_enqueue_script("main_js", get_stylesheet_directory_uri() ."/assets/js/main.js", array('jquery'), "1.0", true );

}



	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
	function wpdocs_excerpt_more( $more ) {
		return ' ';
	}

	add_filter( 'genesis_show_comment_date', 'entrenamiento_remove_comment_time_and_link' );
	function entrenamiento_remove_comment_time_and_link( $comment_date ) {
		printf( '<p %s>', genesis_attr( 'comment-meta' ) );
		printf( '<time %s>', genesis_attr( 'comment-time' ) );
		echo    esc_html( get_comment_date() );
		echo    '</time></p>';

		// Return false so that the parent function doesn't also output the comment date and time
		return false;
	}
	add_filter( 'wp_nav_menu_args', 'entrenamiento_secondary_menu_args' );
	function entrenamiento_secondary_menu_args( $args ) {
		if ( 'secondary' != $args['theme_location'] ) {
			return $args;
		}
		$args['depth'] = 1;
		return $args;
	}

	add_filter( 'wp_nav_menu_args', 'entrenamiento_primary_menu_args' );
	function entrenamiento_primary_menu_args( $args ) {
		if ( 'primary' != $args['theme_location'] ) {
			return $args;
		}
		$args['depth'] = 1;
		return $args;
	}


	function entrenamiento_register_theme_customizer( $wp_customize ){

		/*
		 * Failsafe is safe
		 */
		if ( ! isset( $wp_customize ) ) {
			return;
		}


		$wp_customize->add_section(
		// $id
			'entrenamiento_footer_credit',
			// $args
			array(
				'title'			=> __( 'Footer Credit', 'entrenamiento' ),
				'priority'	 => 31
			)
		);


		$wp_customize->add_setting(
		// $id
			'entrenamiento_footer_credit_stngs',
			// $args
			array(
				'default'		=> __( 'Entrenamiento', 'entrenamiento' ),
				'sanitize_callback'	=> 'esc_html',
				'transport'		=> 'refresh'
			)
		);


		$wp_customize->add_control(

				// $id
				'entrenamiento_footer_credit_crtl',
				// $args
				array(
					'settings'		=> 'entrenamiento_footer_credit_stngs',
					'section'		=> 'entrenamiento_footer_credit',
					'label'			=> __( 'Write Here', 'entrenamiento' ),
					'type'			=> 'text'
				)
		);


		$wp_customize->add_section(
		// $id
			'entrenamiento_section_category',
			// $args
			array(
				'title'			=> __( 'Category Background ', 'entrenamiento' ),
				'priority'	 => 32
			)
		);

		/**
		 * Add 'Home Top Background Image' Setting.
		 */
		$wp_customize->add_setting(
		// $id
			'entrenamiento_cat_background_image',
			// $args
			array(
				'sanitize_callback'	=> 'esc_url_raw',
				'transport'		=> 'refresh'
			)
		);

		/**
		 * Add 'Home Top Background Image' image upload Control.
		 */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
			// $wp_customize object
				$wp_customize,
				// $id
				'entrenamiento_cat_background_image_crtl',
				// $args
				array(
					'settings'		=> 'entrenamiento_cat_background_image',
					'section'		=> 'entrenamiento_section_category',
					'label'			=> __( 'Category Background Image', 'entrenamiento' ),
					'description'	=> __( 'Select the image to be used for Category Background.', 'entrenamiento' )
				)
			)
		);



	}

	// Settings API options initilization and validation.
	add_action( 'customize_register', 'entrenamiento_register_theme_customizer' );







add_filter( 'genesis_seo_title', 'custom_header_inline_logo', 10, 3 );

function custom_header_inline_logo( $title, $inside, $wrap ) {
	// If the custom logo function and custom logo exist, set the logo image element inside the wrapping tags.
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$inside = sprintf( '<span class="screen-reader-text">%s</span>%s', esc_html( get_bloginfo( 'name' ) ), get_custom_logo() );
	} else {
		// If no custom logo, wrap around the site name.
		$inside	= sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), esc_html( get_bloginfo( 'name' ) ) );
	}

	// Build the title.
	$title = genesis_markup( array(
		'open'    => sprintf( "<{$wrap} %s>", genesis_attr( 'site-title' ) ),
		'close'   => "</{$wrap}>",
		'content' => $inside,
		'context' => 'site-title',
		'echo'    => false,
		'params'  => array(
			'wrap' => $wrap,
		),
	) );

	return $title;
}

add_filter( 'genesis_attr_site-description', 'custom_add_site_description_class' );
/**
 * Add class for screen readers to site description.
 * This will keep the site description markup but will not have any visual presence on the page
 * This runs if there is a logo image set in the Customizer.
 *
 * @param array $attributes Current attributes.
 *
 * @author @_neilgee
 * @author @_srikat
 */
function custom_add_site_description_class( $attributes ) {
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$attributes['class'] .= ' screen-reader-text';
	}

	return $attributes;
}

	function prefix_entry() {

		if ( ! function_exists( 'genesis_share_icon_output' ) ) {
			return;
		}


		genesis_share_icon_output( 'before_entry_header', array(  'twitter', 'facebook', 'linkedin' ) );

	}

