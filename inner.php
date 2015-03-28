<?php

/*Template Name: Inner Page Big Padding*/

get_header(); ?>
<?php 
    if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>  
<div id="container">
    <div id="content" class="bigpadding">
            <div id="inner_left">
                <div id="page_title">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div id="inner_right" class="bigp">
                    <?php 
                         the_content(); 
                   ?>                
            </div>
    </div>
</div>
<script>
$(document).ready(function(){  
	$('.bigp').hide();setTimeout(function() {$('.bigp').show();},300)
});
</script>
 <?php endwhile; ?>
