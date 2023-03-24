<?php
get_header();
?>
<div id="blog-page" class="blog-section section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12">  

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>  
<div class="blog-bg">
<?php echo get_the_post_thumbnail();?>
</div>
<div class="blog-content">
<div class="d-flex justify-content-between">
<p class="blog-meta">
<span class="mr-3"><i class="far fa-user-circle"></i><?php echo get_the_author_meta('display_name'); ?></span>
<span> <i class="far fa-calendar-alt"></i><?php echo get_the_date();?></span>
</p>
</div>
<p><?php the_content();?></p>
</div>

    <?php
endwhile;
endif;
?> 
</div>
</div>
</div>
</div>


<?php
get_footer();
?>
