<?php
  // arquivo de tradução
  load_theme_textdomain('ctav');
  
  // widgets
  if(function_exists('register_sidebar'))
  {
    register_sidebar(array(
      'before_widget' => '<div id="%1$s" class="box %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
    ));
    register_sidebar(array(
      'name' => 'Outras notícias',
      'description' => 'Espaço para outras notícias na home',
      'id' => 'other-posts',
      'before_widget' => '<aside id="%1$s" class="widget widget--negative %2$s"><div id="other-posts">',
      'after_widget' => '<br clear="all"></div></aside>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>',
    ));
  }

  function modify_jquery_version() {
    
//        wp_deregister_script('jquery');
//        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-1.9.0.js', false, '1.9.0  ');
//        wp_enqueue_script('jquery');
    
  }
//add_action('init', 'modify_jquery_version');

function load_carrossel() {
    wp_enqueue_script('jquery-flexslider', get_template_directory_uri().'/js/flexslider-min.js', array('jquery'));        
    wp_enqueue_script( 'carrossel_home', get_template_directory_uri() . '/js/carrossel_home.js');
}
add_action('init', 'load_carrossel');
add_image_size('home_carrossel', 728, 200, false);
    
// permite tags adicionais no tinymce 
function ctav_custom_mce_options($init) {
    $ext = 'style,pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
    if (isset($init['extended_valid_elements'])) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }
    return $init;
}

add_filter('tiny_mce_before_init', 'ctav_custom_mce_options');
  
  // includes
  include_once(TEMPLATEPATH.'/inc/Validator.php');
  include_once(TEMPLATEPATH.'/inc/the_thumb.php');
  include_once(TEMPLATEPATH.'/inc/limit_chars.php');
 
// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// adiciona suporte a imagens destacadas
add_theme_support( 'post-thumbnails' );

?>
