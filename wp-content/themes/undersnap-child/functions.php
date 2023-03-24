<?php
function mytheme_breadcrumbs() {

    if (!is_front_page()) {
        echo '<a href="' . get_option('home') . '">Main</a>';
        echo '<i class="far fa-dot-circle"></i>';
     }
        if (is_category() || is_single()) {
            
            the_category('/');
            echo '<i class="far fa-dot-circle"></i>';
            if (is_single()) {
                the_title();
                  echo '<i class="far fa-dot-circle"></i>';
            }
        } elseif (is_page()) {
            echo the_title();
                echo '<i class="far fa-dot-circle"></i>';
        }
  
}
function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


function my_theme_widgets_init() {
  register_sidebar(array(
    'name' => 'My Widget Area',
    'id' => 'my-widget-area',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
  ));
}
add_action('widgets_init', 'my_theme_widgets_init');





