<?php
/**
* Plugin Name: Add new post and taxonomy
* Description:  Ініціалізує новий post type "Об'єкт нерухомості" та taxonomy "Район", де об'єкт нерухомості буде будинком (у будівлі може бути безліч квартир або приміщень).
* Version: 0.1
* Author: Vdovenko
* Author URI: fanx03@gmail.com
**/
function myplugin_register_property_post_type() {
    $labels = array(
        'name' => __( 'Properties', 'myplugin' ),
        'singular_name' => __( 'Property', 'myplugin' ),
        'add_new' => __( 'Add New', 'myplugin' ),
        'add_new_item' => __( 'Add New Property', 'myplugin' ),
        'edit_item' => __( 'Edit Property', 'myplugin' ),
        'new_item' => __( 'New Property', 'myplugin' ),
        'view_item' => __( 'View Property', 'myplugin' ),
        'search_items' => __( 'Search Properties', 'myplugin' ),
        'not_found' => __( 'No properties found', 'myplugin' ),
        'not_found_in_trash' => __( 'No properties found in trash', 'myplugin' ),
        'parent_item_colon' => __( 'Parent Property:', 'myplugin' ),
        'menu_name' => __( 'Properties', 'myplugin' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Properties custom post type',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-home',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'properties' ),
        'capability_type' => 'post'
    );

    register_post_type( 'property', $args );
}
add_action( 'init', 'myplugin_register_property_post_type' );


function myplugin_register_district_taxonomy() {
    $labels = array(
        'name' => __( 'Districts', 'myplugin' ),
        'singular_name' => __( 'District', 'myplugin' ),
        'search_items' => __( 'Search Districts', 'myplugin' ),
        'all_items' => __( 'All Districts', 'myplugin' ),
        'parent_item' => __( 'Parent District', 'myplugin' ),
        'parent_item_colon' => __( 'Parent District:', 'myplugin' ),
        'edit_item' => __( 'Edit District', 'myplugin' ),
        'update_item' => __( 'Update District', 'myplugin' ),
        'add_new_item' => __( 'Add New District', 'myplugin' ),
        'new_item_name' => __( 'New District Name', 'myplugin' ),
        'menu_name' => __( 'Districts', 'myplugin' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' =>true,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'district' ),
);
    
register_taxonomy( 'district', array( 'property' ), $args );
 }
add_action( 'init', 'myplugin_register_district_taxonomy' );   
    


class My_Plugin_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'propetry_filter_widget', // Widget ID
      'propetry_filter_widget', // Widget name
      array('description' => 'A widget for displaying a filter for property') // Widget description
    );
    
    add_action('wp_ajax_my_widget_submit', array($this, 'ajax_submit'));
    add_action('wp_ajax_nopriv_my_widget_submit', array($this, 'ajax_submit'));
  }

  public function widget($args, $instance) {
    // Output the widget HTML
    echo $args['before_widget'];
    echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    include(plugin_dir_path(__FILE__) . 'widget-form.php');
    echo $args['after_widget'];
  }

  public function form($instance) {
    // Output the widget settings form
    $title = isset($instance['title']) ? $instance['title'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    // Save the widget settings
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
    return $instance;
  }
   
  public function ajax_submit() {
//if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
//elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
//
//else { $paged = 1; }
$paged=$_POST['page'];

    // Get the submitted data
   $args = array(
    'post_type' => 'property',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'paged' => $paged,
    'meta_query' => array(
       'relation' => 'AND',  
    )
);      

   
   
   $subfields=array('square','rooms','balcony','wc');
   foreach($_POST["form_data"] as $prop => $val) {
    if (!empty($val)){ 
        if (in_array($prop,$subfields )) { $prop='property_'.$prop; } 
    $args['meta_query'][] = array(
        'key' => $prop,
        'value' => $val,
        'compare' => 'LIKE'
    );
      
    
} 
}   

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) : $the_query->the_post();
    // Output the post content
    $image = get_field('image');  
    $title = get_field('propertyname');  
    ?>  
    
    <div class="single-blog-item" style="display: flex;">
        <div class="blog-bg" style="max-width: 150px;">
        <img src="<?php echo $image;?>">
      </div>
      <div class="blog-content">
        <div class="d-flex justify-content-between">
        </div>
        <a href="<?php echo get_permalink();?>"><?php echo $title;?></a>
        <p><?php the_content();?></p>
        <a href="<?php echo get_permalink();?>" class="read-more">Read More</a>
      </div>
    </div>  
    
    <?php   
  endwhile;
   // Display pagination
  echo '<div class="pagination-block mb-15">';
  echo paginate_links( array(
    'total' => $the_query->max_num_pages,
    'prev_text' => '<i class="fal fa-arrow-left"></i>',
    'next_text' => '<i class="fal fa-arrow-right"></i>',
    'current' => $paged
  ) );
  echo '</div>';
  wp_reset_postdata();
}
else{  echo '<p>No posts found</p>';  }
  wp_die();
  }

  
  
}

function register_my_plugin_widget() {
  register_widget('My_Plugin_Widget');
}
add_action('widgets_init', 'register_my_plugin_widget');

// Register the shortcode
add_shortcode( 'propertyrender', 'my_shortcode_callback' );

// Define the callback function
function my_shortcode_callback() {
    
        
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }
$args = array(
  'post_type' => 'property',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'paged' => $paged
);




$the_query = new WP_Query( $args );


if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
    // Output the post content
   $image = get_field('image');  
   $title = get_field('property_name');  
   ?>
    
<div class="single-blog-item">
<div class="blog-bg">  
<img src="<?php echo $image;?>">
</div>
<div class="blog-content">
<div class="d-flex justify-content-between">


</div>
<a href="<?php echo get_permalink();?>"><?php echo $title;?></a>
<p><?php the_content();?></p>
<a href="<?php echo get_permalink();?>" class="read-more">Read More</a>
</div>
</div>  
    
 <?php   
  endwhile;
   // Display pagination
  echo '<div class="pagination-block mb-15">';
  echo paginate_links( array(
    'total' => $the_query->max_num_pages,
    'prev_text' => '<i class="fal fa-arrow-left"></i>',
    'next_text' => '<i class="fal fa-arrow-right"></i>',
    'current' => $paged
  ) );
  echo '</div>';

  wp_reset_postdata();
else :
  // If no posts found, output message
  echo '<p>No posts found</p>';
endif; 
 
}