<?php

/*Template Name: Modular Systems*/

get_header(); ?>
<?php
if ( have_posts() ) while ( have_posts() ) : the_post();
    ?>
    <div id="container">
        <div id="content" class="mediumpadding">
            <div id="inner_left" style="width:299px">
                <div id="page_title" class="verticle-center">
                    <h1>
                        <a href="/eco-frame/" style="color:inherit;text-decoration: none;">
                        <img class="alignnone size-full wp-image-17" src="http://kadmonbrin.pazazta.com/wp-content/uploads/2014/10/nav.png" alt="" width="17" height="17">
                        &nbsp;ECO FRAME GALLERY
                        </a>
                    </h1>
                    <h1>
                        <a href="/paneline/" style="color:inherit;text-decoration: none;">
                        <img class="alignnone size-full wp-image-17" src="http://kadmonbrin.pazazta.com/wp-content/uploads/2014/10/nav.png" alt="" width="17" height="17">
                        &nbsp;PANELINE GALLERY
                        </a>
                    </h1>
                </div>
            </div>
            <div id="inner_right" class="mediump" style="width:880px">
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
