<?php 

//Import database.php (contains SQL structure)
require get_template_directory() . '/inc/database.php';

//Handles reservation submission
require get_template_directory() . '/inc/reservations.php';

//Creates options pages for the theme
require get_template_directory() . '/inc/options.php';

function lapizzeria_setup() {
	add_theme_support('post-thumbnails');

	add_image_size( 'boxes', 437, 291, true );
	add_image_size( 'specialties', 768, 515, true );
	add_image_size( 'specialty-portrait', 435, 530, true );

	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_l', 164);
}
add_action('after_setup_theme', 'lapizzeria_setup');

function lapizzeria_styles() {
	//adding stylesheets
	//
	wp_register_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900', array(), '1.0.0');
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0.0');
	wp_register_style('fluidbox', get_template_directory_uri() . '/css/fluidbox.min.css', array(), '1.0.0');
	wp_register_style('datetime', get_template_directory_uri() . '/css/jquery.datetimepicker.css', array(), '1.0.0');
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');


	//enqueue the styles
	wp_enqueue_style('googlefont');
	wp_enqueue_style('normalize');
	wp_enqueue_style('fluidbox');
	wp_enqueue_style('datetime');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('style');


	//add JS files
	$api_key = esc_html(get_option('lapizzeria_gmaps_key'));
	wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key='.$api_key.'&callback=initMap', array(), '', true);
	wp_register_script('fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array('jquery'), '1.0.0', true);
	wp_register_script('datetime', get_template_directory_uri() . '/js/jquery.datetimepicker.full.js', array('jquery'), '1.0.0', true);
	wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);


	//enqueue JS files
	wp_enqueue_script('jquery');
	wp_enqueue_script('googlemaps');
	wp_enqueue_script('fluidbox');
	wp_enqueue_script('datetime');
	wp_enqueue_script('script');

	wp_localize_script(
		'script',
		'options',
		array(
			'latitude'	=>	esc_html(get_option('lapizzeria_gmaps_latitude')),
			'longitude'	=>	esc_html(get_option('lapizzeria_gmaps_longitude')),
			'zoom'		=>	esc_html(get_option('lapizzeria_gmaps_zoom')),
			'key'		=>	esc_html(get_option('lapizzeria_gmaps_key'))
		)

	);
}
add_action('wp_enqueue_scripts', 'lapizzeria_styles');

// Add menus

function lapizzeria_menus() {
	register_nav_menus(array(
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria')

	));
}
add_action('init', 'lapizzeria_menus');


function lapizzeria_specialties() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizza', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'La Pizzeria Menu', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'La Pizzeria Menu', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzas found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzas found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'specialties' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon' 		 => get_template_directory_uri() . '/img/icon-pizza.png',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    	'taxonomies'         => array( 'category' ),
	);

	register_post_type( 'specialties', $args );
}

add_action( 'init', 'lapizzeria_specialties' );


//Widget Zone

function lapizzeria_widgets() {
	register_sidebar(array(
		'name'			=>	'Blog Sidebar',
		'id'			=>	'blog_sidebar',
		'before_widget'	=>	'<div class="widget">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3 class="primary-text">',
		'after_title'	=>	'</h3>'
	));

	register_sidebar(array(
		'name'			=>	'Address and Shop Hours',
		'id'			=>	'address_shop',
		'before_widget'	=>	'<p>',
		'after_widget'	=>	'</p>',
	));
}
add_action('widgets_init', 'lapizzeria_widgets');

//Remove Website Field from Comments Form
function disable_website_field($fields) {
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}

add_filter('comment_form_default_fields', 'disable_website_field');

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


function add_async_defer($tag, $handle) {
	if('googlemaps' !== $handle) {
		return $tag;
	}

	return str_replace(' src', 'async="async" defer="defer" src', $tag);
}

add_filter('script_loader_tag', 'add_async_defer', 10, 2);

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');