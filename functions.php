<?php

/**
* Wordpress Naked, a very minimal wordpress theme designed to be used as a base for other themes.
*
* @licence LGPL
* @author Darren Beale - http://siftware.co.uk - bealers@gmail.com - @bealers
* 
* Project URL http://code.google.com/p/wordpress-naked/
*/

/**
* naked_nav()
*
* @desc a wrapper for the wordpress wp_list_pages() function that
* will display one or two unordered lists:
* 1) primary nav, a ul with css id #nav - always shown even if empty
* 2) Optional secondary nav, a ul with css id #subNav
*
* @todo default css provided to allow space for both nav 'bars' one below the other to stop the page jig
*
* @param obj post
* @return string (html)
*/
function naked_nav($post = 0)
{
  $output = "";
  $subNav = "";
  $params = "title_li=&depth=1&echo=0";

  // always show top level
  $output .= '<ul id="nav">';
  $output .= wp_list_pages($params);
  $output .= '</ul>';

  // second level?
  if($post->post_parent)
  {
    $params .= "&child_of=" . $post->post_parent;
  }
  else
  {
    $params .= "&child_of=" . $post->ID;
  }
  $subNav = wp_list_pages($params);

  if ($subNav)
  {
    $output .= '<ul id="subNav">';
    $output .= $subNav;
    $output .= '</ul>';
  }
  return $output;
}

/**
* @desc make the site's heading & tagline an h1 on the homepage and an h4 on internal pages
* Naked's default CSS should make the two different states look identical
*/
function do_heading()
{
  $output = "";

  if(is_home()) $output .= "<h1>"; else  $output .= "<h4>";

  $output .= "<a href='"  . get_bloginfo('url') . "'>" . get_bloginfo('name') . "</a> <span>" . get_bloginfo('description') . "</span>";

  if(is_home()) $output .= "</h1>"; else  $output .= "</h4>";

  return $output;
}

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

/**
* Check to see if this page will paginate
* 
* @return boolean
*/
function will_paginate() 
{
  global $wp_query;
  
  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'mini-menu' => __( 'Mini Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function gettemplatedirectoryuri() 
{
    return get_template_directory_uri();
}

add_theme_support( 'post-thumbnails' );

/** SHORTCODES **/
// [reference align="left" customer="paz eltahan"][/reference]
function add_reference( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'align' => 'left',
		'customer' => '',
	), $atts ) );
        
        if ($align=="left") 
            {$style = "ltr";} 
        else   
           {$style = "rtl";}

        $html = "<div class=\"testemonial {$style}\">\"{$content}\"<span style=\" position: absolute; bottom: 10px; left: 15px; \">{$customer}</span></div>";
                        
        return $html;
}

add_shortcode( 'reference', 'add_reference' );

//Adds gallery shortcode defaults of size="medium" and columns="2"  

function amethyst_gallery_atts( $out, $pairs, $atts ) {
    $atts = shortcode_atts( array(
      'columns' => '2',
      'size' => 'full',
    ), $atts );
 
    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];
 
    return $out;
 
}
add_filter( 'shortcode_atts_gallery', 'amethyst_gallery_atts', 10, 3 );
?>