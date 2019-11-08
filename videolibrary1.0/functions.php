<?php  function add_scipts() {

// Add Scripts
	if (!is_admin()) {
		wp_deregister_script( 'jquery' );
	
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', '', true, '');
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true );
	}
}
add_action('init', 'add_scipts');


// Add Styles
function prefix_add_footer_styles() {
	wp_enqueue_style( 'googlefonts', '//fonts.googleapis.com/css?family=Material+Icons',true,'1.1','all');
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/style.css',true,'1.1','all');

};
add_action( 'get_footer', 'prefix_add_footer_styles' );


// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

//Register Menus

function register_my_menu() {
  register_nav_menu('main_menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

//Add Featured Image to Pages

 add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

//Add SVG Mime Type

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Our custom post type function movie
function create_posttype_video() {

	register_post_type( 'video',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Videos' ),
				'singular_name' => __( 'Video' )
			),
			'show_in_rest' => true,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'video'),
		)
	);
}

add_action( 'init', 'create_posttype_video' );


// Create Movies Taxonomy
function my_taxonomies_videos() {
	$labels = array(
		'name'              => _x( 'Videos Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Video Category', 'taxonomy singular name' ),
		'menu_name'         => __( 'Video Categories' ),
	);
	$args = array(
		'show_in_rest' => true,
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'video_category', 'video', $args );
}
add_action( 'init', 'my_taxonomies_videos', 0 );



// Create CPT for Videos

// Our custom post type function
function create_posttype_video_collection() {

	register_post_type( 'video_collection',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Video Collection' ),
				'singular_name' => __( 'Video Collection' )
			),
			'show_in_rest' => true,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'video_collection'),
		)
	);
}

// Create Video Collection Taxonomy
function my_taxonomies_video_collection() {
	$labels = array(
		'name'              => _x( 'Collections Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Collection Category', 'taxonomy singular name' ),
		'menu_name'         => __( 'Collection Categories' ),
	);
	$args = array(
		'show_in_rest' => true,
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'collection_category', 'video_collection', $args );
}
add_action( 'init', 'my_taxonomies_video_collection', 0 );


// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_video_collection' );



// Custom CSS Styles

function custom_admin_js() {
	wp_enqueue_script( 'admin_scripts', get_template_directory_uri() . '/js/admin.js', array('jquery'), '1.0', true );
    wp_enqueue_style( 'admin_styles', get_template_directory_uri() . '/css/admin.css',true,'1.1','all');
    wp_enqueue_style( 'admin-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Material+Icons',true,'1.1','all');
}
add_action('admin_footer', 'custom_admin_js');

@ini_set( 'upload_max_size' , '300M' );
@ini_set( 'post_max_size', '300M');
@ini_set( 'max_execution_time', '300' );