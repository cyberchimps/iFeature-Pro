<?php
/**
* Index actions used by the CyberChimps Core Framework 
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

add_action( 'chimps_single_post_byline', 'chimps_single_post_byline_content' );

add_action( 'chimps_single_post_tags', 'chimps_single_post_tags_content' );

add_action( 'chimps_single_loop', 'chimps_single_loop_content' );

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function chimps_single_post_byline_content() {
	global $options, $themeslug; //call globals.  
	$hidden = $options->get($themeslug.'_single_hide_byline');?>
	
	<div class="meta">
		<?php if (($hidden[$themeslug.'_single_hide_date']) != '0'):?> <?php printf( __( 'Published on', 'core' )); ?> <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?>
		<?php if (($hidden[$themeslug.'_single_hide_author']) != '0'):?><?php printf( __( 'by', 'core' )); ?> <?php the_author_posts_link(); ?> <?php endif;?> 
		<?php if (($hidden[$themeslug.'_single_hide_categories']) != '0'):?><?php printf( __( 'in', 'core' )); ?> <?php the_category(', ') ?> <?php endif;?>
	</div> <?php
}


/**
* Sets up the tag area
*
* @since 1.0
*/
function chimps_single_post_tags_content() {
	global $options, $themeslug; 
	$hidden = $options->get($themeslug.'_single_hide_byline'); ?>

	<?php if (has_tag() AND ($hidden[$themeslug.'_single_hide_tags']) != '0'):?>
	<div class="tags">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
		
	</div><!--end tags--> 
	<?php endif;
}

/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 1.0
*/
function chimps_single_loop_content($content) { 

	global $options, $themeslug, $post; //call globals
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	} ?>
		
		<?php ob_start(); ?>
			
			<?php if ($options->get($themeslug.'_single_post_formats') != '0') : ?>
			<div class="postformats"><!--begin format icon-->
				<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
			</div><!--end format-icon-->
			<?php endif; ?>
				<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<!--Call @Core Meta hook-->
			<?php chimps_single_post_byline(); ?>
				
				<div class="entry">
					
							<?php the_content(); ?>
					
				</div><!--end entry-->
				
				<div class='clear'>&nbsp;</div>
			<?php	
		
		$content = ob_get_clean();
		$content = apply_filters( 'chimps_post_formats_'.$format.'_content', $content );
	
		echo $content; 
}


/**
* End
*/

?>