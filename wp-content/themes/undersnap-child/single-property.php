<?php
/*
Template Name: Custom Post Type Template
Template Post Type: property
*/
get_header();


?>

<div id="blog-page" class="blog-section section-padding">
<div class="container">
<div class="row">
<div class="col-lg-12">  

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>  
<?php
  $image = get_field('image');  
  $property_name = get_field('property_name');  
    $coordinates = get_field('coordinates');  
      $floors = get_field('floors');  
        $building_type= get_field('building-type');  
          $eco_friendly = get_field('eco-friendly');  
            $property = get_field('property');  
?>
    
    
    
    
<div class="blog-bg">
<?php echo get_the_post_thumbnail();?>
</div>
<div class="blog-content">
    
<img src="<?=$image;?>" style="margin-bottom: 20px;" alt="alt"/>

<h2>General info</h2>
<p><?php the_content();?></p> 
<table class="table" >
    <tr><td>Name</td><td><?=$property_name;?></td></tr>    
        <tr><td>Coordinates</td><td><?=$coordinates;?></td></tr>
                <tr><td>Floors</td><td><?=$floors;?></td></tr>    
                        <tr><td>Eco frendly</td><td><?=$eco_friendly;?></td></tr>    
                        
                        
</table>

<h2>Rooms info</h2>


<img src="<?=$property['room_img'];?>" style="margin-bottom: 20px;" alt="alt"/>

<table class="table" >
    <tr><td>Square</td><td><?=$property['square'];?></td></tr>  
    
    <tr><td>Rooms </td><td><?=$property['rooms'];?></td></tr> 
    <tr><td>Balcony</td><td><?=$property['balcony'];?></td></tr>  
    <tr><td>WC</td><td><?=$property['wc'];?></td></tr>  
     
     
     
     
    </table>

   

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
