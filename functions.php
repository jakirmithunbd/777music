<?php 
//show_admin_bar(false);

require_once get_theme_file_path("/inc/wp-bootstrap-navwalker.php");

function music_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list', "editor"));
    add_theme_support('woocommerce');

	//load text domain
	load_theme_textdomain('tay', get_template_directory() . '/language');
    add_image_size( 'best_selling_image', '160' , '240', true );

	// Menu Register 
	if(function_exists('register_nav_menus')){
    	register_nav_menus(array(
          'menu-1'	=>	__('Left side Menu', 'music'),
          'menu-2'  =>  __('Top Menu', 'music'),
          'menu-3'  =>  __('Footer Menu', 'music'),
		));
	}
}

add_action('after_setup_theme', 'music_setup_theme');

function music_setup_assets(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('dashicon');

	//script ===
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('wow', get_theme_file_uri('/assets/js/wow.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('sidr', get_theme_file_uri('/assets/js/sidr.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('visible-js', '//cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.min.js');
    wp_enqueue_script('lightbox-js', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js');

    wp_enqueue_script('main_js', get_theme_file_uri('/assets/js/scripts.js'), array('jquery'), time(), true);

    $map_icon = get_field('map_pin', 'options');
    $location = get_field('google_map');

  // //localize data 
  $data = array (
    'site_url'   => get_theme_file_uri(),
    'admin_ajax'   => admin_url( 'admin-ajax.php' ),
  );

    // var_dump($data);
    wp_localize_script('main_js', 'ajax', $data);


	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/all.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/assets/css/animate.min.css'));
    wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.min.css'));
    wp_enqueue_style('lightbox-css', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');
	wp_enqueue_style('main_style', get_theme_file_uri('/assets/css/main-style.css'), null, time());
	wp_enqueue_style('tay_style', get_stylesheet_uri(), null, time());
}
add_action('wp_enqueue_scripts', 'music_setup_assets');

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',                 // Dashboard
         'separator1',                // --Space--
         'acf-options',               // ACF Theme Settings
         'edit.php?post_type=page',   // Pages 
         'edit.php',                  // Posts
         'edit.php?post_type=artist', // artist
         'separator2',                // --Space--
         'gf_edit_forms',             // Gravity Forms
         'upload.php',                // Media
         'themes.php',                // Appearance
         'edit-comments.php',         // Comments 
         'users.php',                 // Users
         'tools.php',                 // Tools
         'options-general.php',       // Settings
         'plugins.php',               // Plugins
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Get all page id */
function getPageID() {
  	global $post;
  	$postid = $post->ID;
  	$queried_object = get_queried_object();
  	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
  	}
  	else if (is_front_page()) {
  		$postid = get_option( 'page_on_front' );
  	}
  	else if (is_archive()) {
  		$postid = get_queried_object();
  	}
  	else if ( $queried_object ) {
    	$postid = $queried_object->ID;
   	}

  	return $postid;
}

function music_acf_admin_head() {
    ?>
    <style type="text/css">

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle {
        background-color: #1AB569 !important;
        padding: 35px;
        font-size: 40px;
        color: #fff;
    }

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle span {
        font-size: 2.5rem;
        color: white;
    }

    </style>
    <?php
}

add_action('acf/input/admin_head', 'music_acf_admin_head');

/**
 * Register widget area.
 *
 * 
 */
function music_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'music' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'music' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'music_widgets_init' );


function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function additional_scripts(){
    ?>
    <script>
        wow = new WOW(
          {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
          }
        );
        wow.init();

        
    </script>
    <?php
}
add_action( 'wp_footer', 'additional_scripts', 100 );

add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='btn' id='gform_submit_button_{$form["1"]}'>{$form['button']['text']}<span class=\"glyphicon glyphicon-triangle-right\"></span></button>";
}


function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form-wraper">
    <input type="text" placeholder="Search Here" value="' . get_search_query() . '" name="s" id="s" />
    <button id="searchsubmit" type="submit"><span class="fas fa-search"></button>
    </div>
    </form>';
    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );


// Global Offices
add_action('init','music_artist_post_type');
function music_artist_post_type() {
    register_post_type( 'artist',
        array(
        'labels' =>
        array(
            'name' => __( 'Artists', 'music'),  
            'singular_name' => __( 'Artist', 'music'),
            'add_new_item' => __('Add New Artist', 'music'), 
            'add_new' => __( 'Add New Artist', 'music'),
            'edit_item' => __( 'Edit Artist', 'music'),
            'new_item' => __( 'New Artist', 'music' ),
            'view_item' => __( 'View Artist' ),
            'not_found' => __( 'Sorry, we couldn\'t find the Artist you are looking for.',  'music' ),
        ),

        'public' => true,
        'menu_postion' => 36,
        'show_in_menu ' => true,
        'menu_icon'=>'dashicons-layout',
        'supports' => array( 'title','editor','thumbnail', 'excerpt')
        )
    );
}

