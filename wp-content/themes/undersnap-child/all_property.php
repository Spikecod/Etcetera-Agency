<?php
/*
Template Name: AllProperty
*/
get_header();
?>

<div id="blog-page" class="blog-section section-padding">
<div class="container">
<div class="row">
<div class="col-lg-8 ">
    <div class="filter-render">
        

</div>
</div>
<div class="col-lg-4">
<div class="recent-post">
    
    <?php if (is_active_sidebar('my-widget-area')): ?>
  <div class="widget-area">
    <?php dynamic_sidebar('my-widget-area'); ?>
  </div>
<?php endif; ?>

</div>
</div>
</div>
</div>
</div>



<?php
get_footer();
?>
