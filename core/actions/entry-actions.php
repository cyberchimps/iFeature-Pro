<?php
/**
* Entry actions used by the CyberChimps Core Framework 
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Core
* @since 1.0
*/

/**
* Core Entry actions
*/
//add_action( 'chimps_before_entry', 'chimps_breadcrumbs' );  

//add_action( 'chimps_after_entry', 'chimps_share_section' );


add_action( 'chimps_index_after_entry', 'chimps_index_after_entry_sidebar' );

add_action( 'chimps_index_before_entry', 'chimps_index_before_entry_slider' );
add_action( 'chimps_index_before_entry', 'chimps_index_before_entry_sidebar' );

add_action( 'chimps_index_entry', 'chimps_index_content_slider' );

add_action( 'chimps_meta', 'chimps_meta_byline' );


/**
* Index content slider
*
* @since 1.0
*/
function chimps_index_content_slider() { 
		global $options, $themeslug; ?>
		
		<?php if (v($options, $themeslug.'_hide_slider_blog') != '1' && v($options,$themeslug.'_slider_size') != "full"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('sliderblog', 'page' ); ?>
		</div>
	<?php endif;?> <?

}

/**
* Index content before entry slider
*
* @since 1.0
*/
function chimps_index_before_entry_slider() { 
		global $options, $themeslug; ?>
		
		<?php if (v($options, $themeslug.'_hide_slider_blog') != '1' && v($options,$themeslug.'_slider_size') == "full"): ?>
		<div id = "slider-wrapper">
			<?php get_template_part('sliderblog', 'index' ); ?>
		</div>
	<?php endif;?> <?

}

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_index_after_entry_sidebar() {
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = v($options,$themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
	
	<?php if ($sidebar == '' AND $blogsidebar == ''): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "1" OR $blogsidebar == 'right' ): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>
	<?php if ($sidebar == "2" OR $blogsidebar == 'two-right' ): ?>
		<?php get_sidebar('left'); ?>
	<?php endif;?> <?php
}

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_index_before_entry_sidebar() { 
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = v($options,$themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
			
	<?php if ($sidebar == "4" OR $blogsidebar == 'none'): ?>
		<div id="content_fullwidth">
	<?php endif;?>
	
	<?php if ($sidebar == "1" OR $blogsidebar == "right"): ?>
		<div id="content_left">
	<?php endif;?>
	
	<?php if ($sidebar == '' AND $blogsidebar == ''): ?>
		<div id="content_left">
	<?php endif;?>
	
	<?php if ($sidebar == "3" OR $blogsidebar == 'right-left' ): ?>
		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	<?php endif;?>
	
	<?php if ($sidebar == "2"  OR $sidebar == "3" OR $blogsidebar == "two-right" OR $blogsidebar == "right-left"): ?>
		<?php get_sidebar('right'); ?>
		<div class="content_half">
	<?php endif;?> <?php

}

/**
* Breadcrumbs function
*
* @since 1.0
*/
function chimps_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive for category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} 


/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function chimps_meta_byline() {
	global $options, $themeslug; //call globals  ?>
	
	<div class="meta">
		<?php if ((v($options, $themeslug.'_hide_author')) != '1'):?><?php printf( __( 'Published by', 'core' )); ?> <?php the_author_posts_link(); ?> <?php endif;?> 
		<?php if ((v($options, $themeslug.'_hide_categories')) != '1'):?><?php printf( __( 'in', 'core' )); ?> <?php the_category(', ') ?> <?php endif;?>
		<?php if ((v($options, $themeslug.'_hide_date')) != '1'):?> <?php printf( __( 'on', 'core' )); ?> <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?>
	</div> <?
}

/**
* Sets up the HTML for the post share section
*
* @since 1.0
*/
function chimps_share_section() { ?>

<div class="share">
<a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/facebook.png" alt="Share on Facebook" /></a> <a href="http://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/twitter.png" alt="Share on Twitter" /></a> <a href="http://reddit.com/submit?url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/reddit.png" alt="Share on Reddit" /></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/linkedin.png" alt="Share on LinkedIn" /></a>
</div> <?php

}

/**
* End
*/

?>