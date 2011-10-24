<?php
/**
* Commments actions used by the CyberChimps Core Framework 
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
* Core comments actions
*/
add_action( 'chimps_comments', 'chimps_comments_password_required' );
add_action( 'chimps_comments', 'chimps_comments_loop' );

/**
* Checks if password is required to comment, sets a filter for text that displays.
*
* @since 1.0
*/
function chimps_comments_password_required() {
	$password_text = apply_filters( 'chimps_password_required_text', 'This post is password protected. Enter the password to view comments.');
	if ( post_password_required() ) { 
		printf( __( $password_text, 'core' )); 
		return;
	}
}

/**
* Runs through the comments "loop"
*
* @since 1.0
*/
function chimps_comments_loop() { ?>
<?php if ( have_comments() ) : ?>
	<br />
	<h2 id="comments"><?php comments_number( __('No Responses', 'core' ), __( 'One Response', 'core' ), __('% Responses', 'core' ));?></h2>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>


	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf (__( 'You must be', 'core' )); ?><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php printf( __( 'logged in', 'core' ), '</a>', __('to post a comment.', 'ifeture' )); ?></p>
	<?php else : ?>
	
	<?php comment_form(); ?>
	
		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->	
		
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>
	
</div>

	<?php endif; // If registration required and not logged in ?>

<?php }

/**
* End
*/

?>