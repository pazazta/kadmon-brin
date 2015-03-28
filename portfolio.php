<?php

/*Template Name: Portfolio*/

get_header(); ?>

<script>
    
$(document).ready(function(){    
        init_portfolio();
    });

</script> 

<div id="bg" class="bg_proj"></div>
<div id="bg_proj_nav">
	<img src="/wp-content/themes/KadmonBrin/images/back.png" id="bg_proj_left" />
	<img src="/wp-content/themes/KadmonBrin/images/forward.png" id="bg_proj_right" />
</div>
<div id="container">
    <div id="content" class="mediumpadding">
            <div id="inner_left" style="width:219px">
                <div id="page_title">
                    <h1 style="width:190px;"><?php the_title() ?></h1>
                </div>
            </div>
<div id="inner_right" style="width: 980px;margin-top:-30px;">
                <div id="projects_thumbs_container">
                    <img src="/wp-content/themes/KadmonBrin/images/arrow_up.png" class="arrow_thumbs" id="arrow_up">
                    <div id="project_thumbs">
                        <ul>
                            <?php
                                                        $categories = get_categories();
                                                        if ($categories) {
                                                            foreach($categories as $category) {
                                                                if (strtolower($category->name) === strtolower(get_post_meta(get_the_ID(),"Category",true))) {
                                                                        $cat_id = $category->cat_ID;
                                                                        break;
                                                                }
                                                            }
                                                        }
                                                        $args = array ('category' => $cat_id,'posts_per_page' => 100);
                                                        $myposts = get_posts($args);
                                                        $projects_html = "";
                                                        foreach ($myposts as $post) : setup_postdata($post); 
                            ?>
							  <?php if (!$GLOBALS["detect"]->isMobile()): ?>
									<li><?php the_post_thumbnail(); ?><span><?php the_title(); ?></span></li>
							  <?php endif; ?>
                                                          <?php
                                                            $gallery = get_post_galleries_images( $post->ID );
                                                            $projects_html .= '<div class="proj">';
                                                            foreach ($gallery[0] as $img) {
                                                                if ((string)$img->ID !== get_post_thumbnail_id( $post->ID )) {
                                                                    $projects_html .= '<div class="img_template one_img" data-src="'.$img.'"></div>';
                                                                }
                                                            }
                                                             $projects_html .= '</div>';
                                                            
                                                          ?>
							  <?php endforeach; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <img src="/wp-content/themes/KadmonBrin/images/arrow_down.png" class="arrow_thumbs" id="arrow_down">
                </div>
                <div id="project_slider">
                    <img src="/wp-content/themes/KadmonBrin/images/arrow_left.png" class="arrow_proj" id="prev_img" style="margin-right: 10px;">
                    <div id="the_project">
                        <div id="proj_navigation">
                            <span id="prev_proj">&lt; prev project</span>
                            <span id="next_proj">next project &gt;</span>
                        </div>
                        <div id="images_area">
                            <?php 
                                echo $projects_html;
                            ?>
                        </div>
                        <div id="img_counter"></div>
                    </div>
                    <img src="/wp-content/themes/KadmonBrin/images/arrow_right.png" class="arrow_proj" id="next_img" style="margin-left: 10px;">
                </div>
            </div>
    </div>
</div>

<?php
	get_footer();
?>