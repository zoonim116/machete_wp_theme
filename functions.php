<?php 

require_once 'my_widgets.php';
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
    wp_enqueue_style('mun_override', get_template_directory_uri() . '/css/override.css');

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
    add_theme_support( 'html5', array( 'gallery', 'caption' ) );
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
        'all_items' => __('Все новости', 'machete'),
        'add_new_item' => __('Добавить новость', 'machete')
      ),
      'public' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'menu_icon' => 'dashicons-lightbulb',
      'rewrite' => array('slug' => 'news', 'with_front' => true ),
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
      'rewrite' => true,
      'menu_icon' => 'dashicons-images-alt'
    )
  );

   // Video
  register_post_type('video',
    array(
      'labels' => array(
        'name' => __('Видео', 'machete'),
        'singular_name' =>  __('Видео', 'machete'),
        'all_items' => __('Все видео', 'machete'),
        'add_new' => __('Добавить видео ', 'machete'),
        'add_new_item' => __('Добавить видео', 'machete')
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => true,
      'menu_icon' => 'dashicons-format-video'
    )
  );

     // Photo
  register_post_type('photos',
    array(
      'labels' => array(
        'name' => __('Фото', 'machete'),
        'singular_name' =>  __('Фото', 'machete'),
        'all_items' => __('Все фото', 'machete'),
        'add_new' => __('Добавить фото ', 'machete'),
        'add_new_item' => __('Добавить фото', 'machete')
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true,
      'rewrite' => true,
      'menu_icon' => 'dashicons-format-image'
    )
  );

}



add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {
  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;
}


add_action( 'pre_get_posts', function ( $q ) {
    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'news' ) ) {
        $offset = $q->query['paged'] ? $q->query['paged'] : 1; 
        $q->set('offset', $offset);
    }
});


// Add action for video thumbnails

function set_video_thumbnail($youtubeID , $thumbnail = ""){
   if ($thumbnail) {
       $html = '<img src="'. $thumbnail . '" />';
   } else {
      $html = '<img src="https://img.youtube.com/vi/'.$youtubeID.'/0.jpg" width="360" height="226" />';
   }
   echo $html;
}
add_action('video_thumbnail', 'set_video_thumbnail', 10, 2);

//Add photo album  taxonomy

add_action( 'init', 'create_layout_tax', 0 );

  function create_layout_tax() {
    register_taxonomy(
      'albums',
      array('photos'),
      array(
        'label'             => __( 'Альбом', 'machete' ),
        'hierarchical'       => true,
        'query_var'         => true,
      )
    );
}



// Add fields to settings page

add_action('admin_init', 'my_general_section');

function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        'Дополнительные настройки', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 2
        'option_2', // Option ID
        'Ссылка на  '. __('HAVAKUK', 'machete'), // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'option_2' // Should match Option ID
        )
    );
    register_setting('general','option_2', 'esc_attr');
    // register_setting('general','option_4', 'esc_attr');
}

function return_html_callback($input) {
    return $input;
}

function my_section_options_callback() { // Section Callback
    // echo '<p>A little message on editing info</p>';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
