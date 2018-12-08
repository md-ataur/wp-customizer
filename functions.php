<?php
require_once(get_theme_file_path('/inc/customizer.php'));
require_once(get_theme_file_path( 'lib/csf/cs-framework.php' ));

if( function_exists( 'cs_framework_init' ) ) {
	require_once(get_theme_file_path( "/inc/csf.php" ));
}

define( 'CS_ACTIVE_FRAMEWORK',   false  ); // default true
define( 'CS_ACTIVE_METABOX',     false ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   true ); // default true

function customizer_csf_init(){
	if (function_exists('cs_framework_init')) {
		CSFramework_Customize::instance( array() );		
	}
}
add_action( "init", "customizer_csf_init");


function cust_theme_setup() {
	load_theme_textdomain( 'customizer', get_template_directory_uri() . "/languages" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tags' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
		'comment-list'
	) );
	add_theme_support( 'custom-logo' );
	register_nav_menu( "top-menu", __( "Top Menu", "cust" ) );
}

add_action( 'after_setup_theme', 'cust_theme_setup' );

function cust_assets(){
	wp_enqueue_style('bootstrap','//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-css','//use.fontawesome.com/releases/v5.3.1/css/all.css');
	wp_enqueue_style('cust-main',get_stylesheet_uri(),null,time());

	$service_icon_color = get_theme_mod("cust_services_icon_color","#dd2d6a");
	$services_style =<<<EOD
.service i {
    color: {$service_icon_color};
}
EOD;
	
	wp_add_inline_style( 'cust-main', $services_style );

}
add_action('wp_enqueue_scripts','cust_assets');


function customizer_assets(){
	wp_enqueue_script( "customizer-js", get_theme_file_uri( "assets/js/customizer.js" ), array("jquery","customize-preview"), time(), true );
}
add_action("customize_preview_init","customizer_assets");