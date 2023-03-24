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
