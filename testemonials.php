<?php

/*Template Name: Testemonials Page */

get_header(); ?>

<?php 
    if ( have_posts() ) while ( have_posts() ) : the_post(); 
?> 
<div id="container">
    <div id="content" class="mediumpadding" style="width:1250px;padding-left: 25px;">
                <div id="inner_left">
                    <div id="page_title">
                        <h1><?php the_title() ?></h1>
                    </div>
                </div>
                <div id="inner_right" style="width:1005px">
                     <img src="<?=gettemplatedirectoryuri()?>/images/arrow_left.png" class="arrow" style="margin-right:10px;margin-left: 25px;">
                    <div id="testemonials_wrapper"><div id="testemonials">
                         <?php 
                             the_content(); 
                       ?>   
                    </div></div>
                     <img src="<?=gettemplatedirectoryuri()?>/images/arrow_right.png" class="arrow">     
                </div>
    </div>
</div>
<script>
    init_testemonials();
</script>
 <?php endwhile; ?>
