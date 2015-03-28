<?php

/*Template Name: Read More Page */

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
            <div id="inner_right" class="readmore">
                    <?php 
                         the_content(); 
                   ?>     
					<div id="readmore_stuff">
						<ul>
							<?php
							$args = array('category'=>6,'posts_per_page'   => 100);
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
									<li>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<span class="post_date"> <?=date("M Y", strtotime($post->post_date))?></span>
									</li>
							<?php endforeach; 
							wp_reset_postdata();?>
                        </ul>
					</div>
					
					
            </div>
    </div>
</div>
 <?php endwhile; ?>
