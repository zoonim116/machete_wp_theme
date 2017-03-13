<?php 
/**************************************************** Register scripts and styles *********************************************************************/
function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/libs/magnific/jquery.magnific-popup.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/libs/owlcarousel/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/libs/isotope.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/libs/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'commonn', get_template_directory_uri() . '/js/common.js', array(), '1.0.0', true );


    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/libs/magnific/magnific-popup.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/libs/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('owl.theme', get_template_directory_uri() . '/libs/owlcarousel/assets/owl.theme.default.min.css');
    wp_enqueue_style('mun_animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('mun_font', get_template_directory_uri() . '/css/font.css');
    wp_enqueue_style('mun_style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('mun_media', get_template_directory_uri() . '/css/media.css');

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


/************************************************** Register menus **************************************************************************/
function register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Меню' ),
    )
  );
}
add_action( 'init', 'register_menus' );

/************************************************** Setup theme **************************************************************************/
add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
    $res = load_theme_textdomain('machete');

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    // set_post_thumbnail_size( 825, 510, true );
}

/************************************************** Add custom post type **************************************************************************/
add_action( 'init', 'create_post_type' );
function create_post_type() { 

  // News
  register_post_type('news',
    array(
      'labels' => array(
        'name' => __('Новости', 'machete'),
        'singular_name' =>  __('Новость', 'machete'),
        'add_new' => __('Добавить новость', 'machete'),
        'add_new_item' => __('Добавить новость', 'machete')
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => true
    )
  );

    // Homepage Slider
  register_post_type('homepage_slider',
    array(
      'labels' => array(
        'name' => __('Слайдер на главной', 'machete'),
        'singular_name' =>  __('Слайдер на главной', 'machete'),
        'add_new' => __('Добавить слайд на главную ', 'machete'),
        'add_new_item' => __('Добавить слайд на главную', 'machete')
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => true
    )
  );

}

