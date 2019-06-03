<?php
/**
 * North Shore functions and definitions
 *
 * @package North Shore
 */
define( 'NORTH_SHORE_THEME_VERSION' , '1.0.07' );

global $north_shore_default_settings, $demo_slides;

$demo_slides = array(
	'slide1' => array(
		'image' => get_stylesheet_directory_uri() . '/library/images/demo/slider-default01.jpg',
		'text' => __( '<h2>The ocean brings joy to the soul</h2><p>There is a pleasure in the pathless woods, There is a rapture on the lonely shore, There is society where none intrudes, By the deep Sea, and music in its roar: I love not Man the less, but Nature more.</p><p><a href="http://www.outtheboxthemes.com/wordpress-themes/north-shore/" target="_blank" class="button no-bottom-margin">Read More</a></p>', 'north-shore' )
	),
	'slide2' => array(
		'image' => get_stylesheet_directory_uri() . '/library/images/demo/slider-default02.jpg',
		'text' => __( '<h2>On the beach, you can live in bliss</h2><p>When this world\'s too much it will be only the ocean and me, And all of these troubles will all be erased soon, They go out with the tide</p><p><a href="http://www.outtheboxthemes.com/wordpress-themes/north-shore/" target="_blank" class="button no-bottom-margin">Read More</a></p>', 'north-shore' )
	)
);

$north_shore_default_settings = array(
	'citylogic-primary-color' => '#33a7a4',
	'citylogic-secondary-color' => '#004652',
	'citylogic-top-bar-color' => '#33a7a4',
	'citylogic-site-title-font' => 'Nothing You Could Do',
	'citylogic-site-title-font-color' => '#33a7a4',
	'citylogic-site-title-font-letter-spacing' => '1',
	'citylogic-widget-title-content-font-color' => '#33a7a4',
	'citylogic-widget-title-underline-color' => '#33a7a4',
	'citylogic-header-translucent-site-title-font-color' => '#33a7a4',
	'citylogic-header-transparent-site-title-font-color' => '#33a7a4',
	'citylogic-navigation-menu-solid-font-color' => '#FFFFFF',
	'citylogic-header-info-text-one' => 'Call Us: 555-NORTH-SHORE',
	'citylogic-site-title-font-size' => 50,
	'citylogic-site-title-uppercase' => 0,
	'citylogic-layout-logo-container-opacity' => 1,
	'citylogic-navigation-menu-opacity' => 1,
	'citylogic-navigation-menu-alignment' => 'left-aligned',
	'citylogic-navigation-menu-color' => '#004652',
	'citylogic-navigation-menu-rollover-style' => 'rollover-background-color',
	'citylogic-navigation-menu-rollover-background-color' => '#33a7a4',
	'citylogic-navigation-menu-font' => 'Raleway',
	'citylogic-navigation-menu-font-weight' => '400',
	'citylogic-heading-font' => 'Raleway',
	'citylogic-heading-font-weight' => '300',
	'citylogic-transparent-header' => 0,
	'citylogic-navigation-menu-search-button-text' => '',
	'citylogic-mobile-menu-button-background-color' => '#33a7a4',
	'citylogic-mobile-menu-color' => '#33a7a4',
	'citylogic-slider-overlay-opacity' => '0',
	'citylogic-slider-paragraph-line-height' => '1.7',
	'citylogic-slider-text-overlay-vertical-position' => 'one-third',
	'citylogic-header-image-overlay-opacity' => '0',
	'citylogic-header-image-paragraph-line-height' => '1.7',
	'citylogic-header-image-text-overlay-vertical-position' => 'one-third',
	'citylogic-header-image-text' => '',
	'citylogic-social-right-aligned-buttons' => 0,
	'citylogic-link-color' => '#33a7a4',
	'citylogic-link-rollover-color' => '#004652'
);

if ( ! function_exists( 'north_shore_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function north_shore_theme_setup() {

	// The custom header is used if no slider is enabled
	add_theme_support( 'custom-header', array(
        'default-image' => get_stylesheet_directory_uri() . '/library/images/headers/default.jpg',
		'width'         => 1663,
		'height'        => 709,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
		'video' 		=> false
	) );

}
endif; // north_shore_theme_setup
add_action( 'after_setup_theme', 'north_shore_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function north_shore_theme_scripts() {
	wp_enqueue_style( 'north-shore-site-title-font-default', '//fonts.googleapis.com/css?family=Nothing You Could Do:100,300,400,600,700,800', array(), NORTH_SHORE_THEME_VERSION );
	wp_enqueue_style( 'citylogic-style', get_template_directory_uri() . '/style.css', array(), CITYLOGIC_THEME_VERSION );
	wp_enqueue_style( 'north-shore-style', get_stylesheet_uri(), array(), NORTH_SHORE_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'north_shore_theme_scripts' );

function citylogic_add_menu_items( $items, $args ) {
	
    if ( $args->theme_location == 'primary' ) {
    	
    	$navigation_menu_search_type = get_theme_mod( 'citylogic-navigation-menu-search-type', customizer_library_get_default( 'citylogic-navigation-menu-search-type' ) );
    	
		if( get_theme_mod( 'citylogic-navigation-menu-search-button', customizer_library_get_default( 'citylogic-navigation-menu-search-button' ) ) ) :
			$items .= '<li class="search-button ' .esc_attr( $navigation_menu_search_type). '">';
		
			if ( $navigation_menu_search_type == 'default' ) {
		        $items .= '<a href="">';
		        $items .= get_theme_mod( 'citylogic-navigation-menu-search-button-text', customizer_library_get_default( 'citylogic-navigation-menu-search-button-text' ) ); 
		        $items .= '<i class="otb-fa otb-fa-search search-btn"></i>';
		        $items .= '</a>';
			} else {
				$items .= do_shortcode( get_theme_mod( 'citylogic-navigation-menu-search-plugin-shortcode', customizer_library_get_default( 'citylogic-navigation-menu-search-plugin-shortcode' ) ) );
			}
	        $items .= '</li>';
		endif;

    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'citylogic_add_menu_items', 10, 2 );

function north_shore_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'citylogic-navigation-menu-search-button-text' );
	
	$wp_customize->add_control(
		'citylogic-navigation-menu-search-button-text',
		array(
			'type' => 'text',
			'section' => 'citylogic-search',
			'label' => __('Search Button Text', 'north-shore'),
			'settings' => 'citylogic-navigation-menu-search-button-text',
			'priority'   => 30
		)
	);
}
add_action( 'customize_register', 'north_shore_customize_register'); //second argument is arbitrary, but cannot have hyphens because php does not allow them in function names.

/**
 * Set North Shore defaults.
 */
function north_shore_load_customizer_settings() {
    global $wp_customize, $north_shore_default_settings;
    
    foreach ($north_shore_default_settings as $key => $value) {
    	$wp_customize->get_setting( $key )->default = $value; 
    }
}
add_action( 'customize_controls_init', 'north_shore_load_customizer_settings' );
add_action( 'customize_preview_init', 'north_shore_load_customizer_settings' );

function north_shore_set_customizer_defaults() {
	global $north_shore_default_settings;
	
	$customizer_library = Customizer_Library::Instance();
	
    foreach ($north_shore_default_settings as $key => $value) {
    	$customizer_library->options[ $key ]['default'] = $value;
    }
}
add_action( 'wp_enqueue_scripts', 'north_shore_set_customizer_defaults');
