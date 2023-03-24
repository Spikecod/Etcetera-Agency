<?php
/**
 * Template Name: Archive Template
 *
 * This is a custom page template for archive pages.
 */

// Add your code here to retrieve the current category and modify the $args array
get_header();
?>

<div id="blog-page" class="blog-section section-padding">
<div class="container">
<div class="row">
<div class="col-lg-8">
 
    
<?php

$current_category = get_queried_object();
if ($current_category!=null) {
$category_id = $current_category->term_id;}


if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

if ($current_category!=null) {
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'cat' => $category_id,
  'paged' => $paged
);
} else {   
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'paged' => $paged
);
    }



$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
    // Output the post content
    
   ?>  
    
<div class="single-blog-item">
<div class="blog-bg">
<?php echo get_the_post_thumbnail();?>
</div>
<div class="blog-content">
<div class="d-flex justify-content-between">
<p class="blog-meta">
<span class="mr-3"><i class="far fa-user-circle"></i><?php echo get_the_author();?></span>
<span> <i class="far fa-calendar-alt"></i><?php echo get_the_date();?></span>
</p>

</div>
<a href="single-blog.html"><?php get_the_title();?></a>
<p><?php the_content();?></p>
<a href="<?php echo get_permalink();?>" class="read-more">Read More</a>
</div>
</div>  
    
 <?php   
  endwhile;
    wp_reset_postdata();
   // Display pagination
  echo '<div class="pagination-block mb-15">';
  echo paginate_links( array(
    'total' => $the_query->max_num_pages,
    'prev_text' => '<i class="fal fa-arrow-left"></i>',
    'next_text' => '<i class="fal fa-arrow-right"></i>',
    'current' => $paged
  ) );
  echo '</div>';


else :
  // If no posts found, output message
  echo '<p>No posts found</p>';
endif; 
   ?>
    
</div>
<div class="col-lg-4">

  
    
    
 <?php 


 
if ($current_category!=null) {
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'cat' => $category_id,
  'paged' => $paged
);
} else {   
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'paged' => $paged
);
    }
$the_query = new WP_Query( $args ); 
 ?>     
<div class="recent-post">
<h5>Recent Post in this category</h5>
<?php
if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
    // Output the post content
   ?>  

<?php echo get_the_post_thumbnail();?>
<div class="single-recent-post">
<h6> <a href="<?php echo get_permalink();?>"><?php the_title();?></a></h6>
<p class="blog-date"><i class="las la-calendar"></i><?php echo get_the_date();?></p>
</div>
 <?php   
  endwhile;
      wp_reset_postdata();
  endif;
  ?>


</div>
    



</div>
</div>
</div>
</div>









<?php
get_footer();
?>
