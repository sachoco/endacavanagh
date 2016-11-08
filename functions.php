<?php
/**
 * Cavanagh functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cavanagh
 */

if ( ! function_exists( 'cavanagh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cavanagh_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cavanagh, use a find and replace
	 * to change 'cavanagh' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cavanagh', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'cavanagh' ),
		'mobile' 	=> esc_html__( 'Mobile Menu', 'cavanagh' ),
		'secondary' => esc_html__( 'Secondry Menu', 'cavanagh'),
		'footer' => esc_html__( 'Footer Menu', 'cavanagh'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cavanagh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // cavanagh_setup
add_action( 'after_setup_theme', 'cavanagh_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cavanagh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cavanagh_content_width', 640 );
}
add_action( 'after_setup_theme', 'cavanagh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cavanagh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cavanagh' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cavanagh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cavanagh_scripts() {
	wp_enqueue_style( 'cavanagh-style', get_stylesheet_uri() );

	//wp_enqueue_style('cavanagh-menustyle', get_template_directory_uri() . '/menu.css');
	//wp_enqueue_script( 'cavanagh-menu', get_template_directory_uri() . '/js/menu.js', array(), '20120207', true );

	wp_enqueue_script( 'cavanagh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cavanagh-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js', array( 'jquery' ) );
	// wp_enqueue_script( 'isotope', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.js', array( 'jquery' ) );

  wp_enqueue_script( 'cavanagh-jsplugins', get_template_directory_uri() . '/js/js-plugins.js', array(), '20120222', true );
  wp_enqueue_script( 'cavanagh-isotopebkg', get_template_directory_uri() . '/js/packery-mode.pkgd.min.js', array(), '20130222', true );
	wp_enqueue_script( 'cavanagh-isotope', get_template_directory_uri() . '/js/portfolio-layout.js', array(), '20120233', true );

	wp_enqueue_style('cavanagh-menustyle', get_template_directory_uri() . '/shortcodes.css');


	wp_enqueue_style('fancybox_css', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
	wp_enqueue_script('fancybox_js', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js', array( 'jquery' ) );
	wp_enqueue_script('fbbuttons_js', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js', array( 'jquery' ) );

	wp_enqueue_script('touchswipe_js', '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.15/jquery.touchSwipe.min.js', array( 'jquery' ) );

  // wp_enqueue_style('fancybox_css', get_template_directory_uri() . '/fancybox3/jquery.fancybox.css');
  // wp_enqueue_script('fancybox_js', get_template_directory_uri() . '/fancybox3/jquery.fancybox.js', array( 'jquery' ) );


  wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/css/style.css' );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'cavanagh_scripts' );

add_theme_support( 'post-thumbnails' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Our custom post type function
function create_posttype() {

	register_post_type( 'galleries',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio' )
			),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies' => array( 'category', 'post_tag' ),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolios'),
			'menu_icon' => 'dashicons-format-gallery',
		)
	);


  register_post_type( 'projects',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
      // You can associate this CPT with a taxonomy or custom taxonomy.
      'taxonomies' => array( 'category', 'post_tag' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'project'),
      'menu_icon' => 'dashicons-format-gallery',
    )
  );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// THUMBNAILS TO ADMIN POST VIEW
add_filter('manage_galleries_posts_columns', 'posts_columns', 5);
add_action('manage_galleries_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['cavanagh_post_thumbs'] = __('Thumbnail');
    $defaults['cavanagh_post_refno'] = __('Ref. No.');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
    if($column_name === 'cavanagh_post_thumbs'){
		$photo = get_field('photo', $id);
		echo '<img src="'.$photo['sizes']['listthumb'].'" alt="'.$photo['title'].'" />';
    }
    if($column_name === 'cavanagh_post_refno'){
		$refno = get_field('reference_number', $id);
		echo $refno;
    }
}

//make refno column sortable
add_filter( 'manage_edit-galleries_sortable_columns', 'sortable_refno_column' );
function sortable_refno_column( $columns ) {
    $columns['cavanagh_post_refno'] = 'cavanagh_post_refno';
    return $columns;
}

/**
 * Define the sorting criteria for the refno
 */
add_action( 'pre_get_posts', 'cavangh_refno_sorting_criteria', 999 );
function cavangh_refno_sorting_criteria( $query )
{
  global $pagenow;

  $condition = is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='galleries';
  if( !$condition )
    return $query;

  $orderby = $query->get( 'orderby' );

  if( $orderby != 'cavanagh_post_refno' )
    return $query;

  $query->set( 'meta_key', 'reference_number' );
  $query->set( 'orderby', 'meta_value' ); 

  return $query;
}

add_filter( 'posts_orderby', 'cavanagh_orderby_ref_no_natural' );

function cavanagh_orderby_ref_no_natural( $orderby )
{
    global $wpdb, $pagenow;

    $condition = is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='galleries' && !empty( $_GET[ 'orderby' ] ) && $_GET[ 'orderby' ] == 'cavanagh_post_refno';
    if( !$condition )
    {
      return $orderby;
    }


    $field = $wpdb->prefix.'postmeta.meta_value';

    $asc = strpos( strtolower($orderby), 'asc');

    $ascDesc = $asc === FALSE ? 'DESC' : 'ASC';

    $new = str_replace( $field . ' ' . $ascDesc, 'LENGTH( ' . $field . ' ), CAST(' . $field . ' AS unsigned), ' . $field . ' ' . $ascDesc, $orderby); 

    // die( $new ); 

    return $new;

}


//make refno column searchable
add_filter('posts_join', 'cavanagh_refno_search_join' );
function cavanagh_refno_search_join ($join){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "galleries"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='galleries' && $_GET['s'] != '') {
        $join .='LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'cavanagh_refno_search_where' );
function cavanagh_refno_search_where( $where ){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='galleries' && $_GET['s'] != '') {
        $where = preg_replace(
       "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}


function wpa56343_search() {
    if ( !isset( $_POST['search'] ) )
        exit;

    get_template_part( 'template-portfolio-search' );
    exit;
}

add_action( 'wp_ajax_nopriv_wpa56343_search', 'wpa56343_search', 100 );
add_action( 'wp_ajax_wpa56343_search',        'wpa56343_search', 100 );


/**
 * Frontend search for projects
 * @return [type] [description]
 */
function wpa56344_search() {
    if ( !isset( $_POST['search'] ) )
        exit;

    get_template_part( 'template-projects-search' );
    exit;
}

add_action( 'wp_ajax_nopriv_wpa56344_search', 'wpa56344_search', 100 );
add_action( 'wp_ajax_wpa56344_search',        'wpa56344_search', 100 );


function featured_image_before_content( $content ) {
    if ( is_singular('post') && has_post_thumbnail()) {
        $thumbnail = get_the_post_thumbnail();
        $content = $thumbnail . $content;
	}

    return $content;
}
add_filter( 'the_content', 'featured_image_before_content' );

function portfolio_image_before_content( $content ) {
    if ( is_singular('galleries')) {

		$photo = get_field('photo', $content->ID);
		$image = '<div class="fire-modal"><a href="' . $photo['url'] . '"><img src="'.$photo['sizes']['large'].'" alt="'.$photo['title'].'" /></a></div>';
        $content = $image . $content;
	}

    return $content;
}
add_filter( 'the_content', 'portfolio_image_before_content' );


function portfolio_image_the_excerpt( $content ) {

	$photo = get_field('photo', $content->ID);
    if ($photo) {
		$image = '<a href="'. esc_url(get_permalink($content->ID)).'"><img align="right" border="0" class="excerpt-thumbnail" src="'.$photo['sizes']['thumbnail'].'" alt="'.$photo['title'].'" /></a>';
        $content = $image . $content;
	}

    return $content;
}
add_filter( 'get_the_excerpt', 'portfolio_image_the_excerpt' );


//woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//remove ad to cart button from shop page
function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 36;' ), 20 );


//remove sku from product page
function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }

    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

//remove reviews tab from woocommerce product
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}
//woocommerce - disable dimentions display
add_filter( 'wc_product_enable_dimensions_display', '__return_false' );

//wooocommerce social media share buttons - customization
remove_action( 'woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 31 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40 );

add_action( 'woocommerce_before_single_product_summary', 'show_product_images', 20 );
function show_product_images(){
  global $post;
  $main_image = get_field('main_image', $post->ID);
  if(!$main_image||$main_image==""){
    $main_image = get_the_post_thumbnail($post->ID);
    echo "<div id='image_container'><div class='preview-wrapper'>".get_the_post_thumbnail($post->ID)."</div></div>";
  } else {
    echo "<div id='image_container'><div class='preview-wrapper'><a class='fancybox' title='".$post->post_title."' href='".$main_image[url]."'><img class='preview' src='".$main_image[url]."'></a></div></div>";    
  }

}

add_action( 'after_setup_theme', 'define_additional_images_sizes' );
function define_additional_images_sizes()
{
  add_image_size( 'masonry-thumbnail', 500 );
  add_image_size( 'project-thumbnail', 500, 375, true );
  // add_image_size( 'project-thumbnail', 500, 375, true );
}

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );


define( 'CMB_PATH', get_template_directory() . '/inc/Custom-Meta-Boxes-master/' );
define( 'CMB_URL', get_template_directory_uri() . '/inc/Custom-Meta-Boxes-master/' );

/**
 * Metaboxes Programatically for repeater fields
 */
require_once( get_template_directory() . '/inc/Custom-Meta-Boxes-master/custom-meta-boxes.php' );

add_filter( 'cmb_meta_boxes', 'cavanagh_metabox_projects' );

function cavanagh_metabox_projects( $meta_boxes )
{
    $fields = array(
      array(
      'id' => 'album',
      'name' => 'Album Photo',
      'type' => 'group',
      'repeatable' => true,
      'sortable' => true,
      'string-repeat-field' => 'Add Photo',
      'string-delete-field' => 'Remove Photo',
      'fields' => array(
          array(
            'id'   => 'image',
            'name' => 'Image',
            'type' => 'image',
          ),
          array(
            'id'   => 'title',
            'name' => 'Title',
            'type' => 'text',
          )
       )
      )
    );

   $meta_boxes[] = array(
        'title' => 'Project Options - Album',
        'pages' => 'projects',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => $fields,
        'desc' => 'Here you can upload your photos along with their names.',
    );

   return $meta_boxes;
}


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// function template_chooser($template)
// {
//   global $wp_query;
//   $post_type = get_query_var('post_type');
//   var_dump($post_type);
//   if( $wp_query->is_search && $post_type == 'galleries' )
//   {
//     echo "test";
//     // return locate_template('archive-recipes.php');
//   }
//   return $template;
// }
// add_filter('template_include', 'template_chooser');


/*
 * wc_remove_related_products
 * 
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.  
 */
function wc_remove_related_products( $args ) {
  return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 



add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {

     $currencies['EU'] = __( 'EU', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
          case 'EU': $currency_symbol = 'EU';
          case 'EUR': $currency_symbol = 'EU'; break;
     }
     return $currency_symbol;
}

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

  function woocommerce_template_loop_product_thumbnail() {
//     add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
//     echo woocommerce_get_product_thumbnail('medium_large');
  global $post;
    if ( has_post_thumbnail() )
          echo get_the_post_thumbnail( $post->ID, "shop_thumbnail" );
//     remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
  }
}
// add_filter( 'woocommerce_shipping_chosen_method', '__return_false', 99);
function ea_default_shipping_method( $method ) {
    $_cheapest_cost = 100000;
  $packages = WC()->shipping()->get_packages()[0]['rates'];

  foreach ( array_keys( $packages ) as $key ) {
        if ( ( $packages[$key]->cost > 0 ) && ( $packages[$key]->cost < $_cheapest_cost ) ) {
            $_cheapest_cost = $packages[$key]->cost;
            $method_id = $packages[$key]->id;
        }
  }

  return $method_id;
}
add_filter( 'woocommerce_shipping_chosen_method', 'ea_default_shipping_method', 10 );

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

  if ( ! $q->is_main_query() ) return;
  if ( ! $q->is_post_type_archive() ) return;
  
  if ( ! is_admin() && is_shop() ) {

    $q->set( 'tax_query', array(array(
      'taxonomy' => 'product_cat',
      'field' => 'ID',
      'terms' => array( 80 ), // Don't display products in the knives category on the shop page
      'operator' => 'NOT IN'
    )));
  
  }

  // remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}
add_action( 'woocommerce_single_product_summary', 'dev_designs_show_sku', 5 );
function dev_designs_show_sku(){
    global $product;
    echo '<div class="sku">Ref#: ' . $product->get_sku() . '</div>';
}

/**
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */

add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_product_category() ) {
        $breadcrumb[] = array(
            'url' => get_permalink( woocommerce_get_page_id( 'shop' ) ),
            'text' => 'Shop',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}