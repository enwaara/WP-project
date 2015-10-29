<?php

$version = '1.1';

function my_excerpt_length( $length ) {

	return 2;
}

add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_filter('excerpt_length', 'my_excerpt_length');
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wpf_custom_add_cart_text',11);


function wpf_custom_add_cart_text() {

      return __( 'Add to cart', 'woocommerce' );
 }

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );
 
function woo_custom_cart_button_text() {
 
        return __( 'Add to cart', 'woocommerce' );
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
add_filter( 'wc_product_sku_enabled', '__return_false' );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );

    return $tabs;
}

function wp_add_styles_scripts( ) {

	if( WP_DEBUG == true ) {

		wp_enqueue_script( 'debug-js', get_template_directory_uri().'/js/debug.js');
	} 

	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js');
	wp_enqueue_style( 'whatever_style', get_template_directory_uri().'/css/main.css', array() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );

function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
}

add_action('wp_enqueue_scripts', 'wp_add_styles_scripts');

add_action('init', 'wp_add_theme_support');

function wp_add_theme_support() {
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('aside', 'video'));
	add_theme_support( 'menus' );
	add_theme_support( 'woocommerce' );
}

register_nav_menus(array(

	'main_menu' => __('Main menu'),
));

function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Contacts', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Contact', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Contact', 'text_domain' ),
		'name_admin_bar'      => __( 'Contact', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Contacts', 'text_domain' ),
		'add_new_item'        => __( 'Add New Contact', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Contact', 'text_domain' ),
		'edit_item'           => __( 'Edit Contact', 'text_domain' ),
		'update_item'         => __( 'Update Contact', 'text_domain' ),
		'view_item'           => __( 'View Contact', 'text_domain' ),
		'search_items'        => __( 'Search Contact', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'Contact', 'text_domain' ),
		'description'         => __( 'Contact Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'contact-post', $args );
}

add_action( 'init', 'custom_post_type', 0 );

function my_search(){

	$query_string = $_GET['q'];
	$s = new WP_Query(array( 's' => $query_string ));

	echo '<ul>';
	while($s->have_posts()){ 
		$s->the_post();?>

		<li>
			<a href="<?php echo get_permalink($post->ID)?>">
				<?php the_post_thumbnail(); ?>
				<h4><?php the_title(); ?></h4>
			</a>
		</li>

	<?php }
	echo '</ul>';

	wp_die();
}

add_action('wp_ajax_search', 'my_search');
add_action('wp_ajax_nopriv_search', 'my_search');

show_admin_bar(false);

?>
