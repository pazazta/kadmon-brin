<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */
get_header(); ?>
<?php 
    if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>  
<div id="container">
    <div id="content" class="mediumpadding">
            <div id="inner_left">
                <div id="page_title">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div id="inner_right" class="post rtl">
                    <?php 
                         the_content(); 
                   ?>                
            </div>
    </div>
</div>
 <?php endwhile; ?>
