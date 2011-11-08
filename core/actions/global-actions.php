<?php
/**
* Global actions used by the CyberChimps Core Framework 
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
* Core global actions
*/
add_action( 'chimps_post_byline', 'chimps_post_byline_content' );

add_action( 'chimps_post_bar', 'chimps_post_bar_content' );

add_action( 'chimps_edit_link', 'chimps_edit_link_content' );

add_action( 'chimps_link_pages', 'chimps_link_pages_content' );

add_action( 'chimps_post_tags', 'chimps_post_tags_content' );

add_action( 'chimps_fb_like_plus_one', 'chimps_fb_like_plus_one_content' );

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function chimps_post_byline_content() {
	global $options, $themeslug; //call globals  ?>
	
	<div class="meta">
		<?php if ($options->get($themeslug.'_hide_author') != '1'):?><?php printf( __( 'Published by', 'core' )); ?> <?php the_author_posts_link(); ?> <?php endif;?> 
		<?php if ($options->get($themeslug.'_hide_categories') != '1'):?><?php printf( __( 'in', 'core' )); ?> <?php the_category(', ') ?> <?php endif;?>
		<?php if ($options->get($themeslug.'_hide_date') != '1'):?> <?php printf( __( 'on', 'core' )); ?> <a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a><?php endif;?>
	</div> <?
}

/**
* Sets up the HTML for the post share section
*
* @since 1.0
*/
function chimps_post_bar_content() { 
	global $options, $themeslug; ?>

	<div class="postmetadata">
		<div class="share">
		<a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/facebook.png" alt="Share on Facebook" /></a> 
		<a href="http://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/twitter.png" alt="Share on Twitter" /></a> 
		<a href="http://reddit.com/submit?url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/reddit.png" alt="Share on Reddit" /></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/share/linkedin.png" alt="Share on LinkedIn" /></a>	
		</div><!--end share-->
				
		<div class="comments">
			<?php if ($options->get($themeslug.'_hide_comments') != '1'):?>
				<?php comments_popup_link( __('No Comments &#187;', 'core' ), __('1 Comment &#187;', 'core' ), __('% Comments &#187;' , 'core' )); //need a filer here ?>
			<?php endif;?>
		</div><!--end comments-->	
	</div><!--end postmetadata--> <?php
}

/**
* Sets up the WP edit link
*
* @since 1.0
*/
function chimps_edit_link_content() {
	edit_post_link('Edit', '<p>', '</p>');
}

/**
* Sets up the WP link pages
*
* @since 1.0
*/
function chimps_link_pages_content() {
	 wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
}

/**
* Sets up the tag area
*
* @since 1.0
*/
function chimps_post_tags_content() {
	global $options, $themeslug; ?>

	<div class="tags">
		<?php if ($options->get($themeslug.'_hide_tags') != '1'):?>
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
		<?php endif;?>
	</div><!--end tags--> <?php
}

/**
* Sets up the Facebook Like and Google Plus One area
*
* @since 1.0
*/
function chimps_fb_like_plus_one_content() {
	global $options, $themeslug; ?>

	<?php if ($options->get($themeslug.'_show_gplus') == "1"):?>
		<div class="gplusone">	
			<g:plusone size="standard" count="true"></g:plusone>
		</div>
	<?php endif;?>
						
	<?php if ($options->get($themeslug.'_show_fb_like') == "1"):?>			
		<div id="fb">
			<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:330px; height:28px"></iframe>
		</div>
	<?php endif;
}

/**
* End
*/

?>