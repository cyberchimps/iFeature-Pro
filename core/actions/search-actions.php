<?php
/**
* Search actions used by the CyberChimps Core Framework 
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
* Core search actions
*/
add_action( 'chimps_search', 'chimps_search_content' );

/**
* Search results output
*
* @since 1.0
*/
function chimps_search_content() { ?>
	<div id="content_left">
		
		<div class="content_padding">

		<?php if (have_posts()) : ?>

		<h2><font size="5"><?php printf( __( 'Search Results For: %s' ), '<span>' . get_search_query() . '</span>' ); ?></font></h2><br />

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php get_template_part('meta', 'search' ); ?>

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</div>

	</div><!--end post_container-->
		<?php endwhile; ?>

		<?php chimps_pagination(); ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>
		</div><!--end content_padding-->
	</div><!--end content_left--><?php
}

/**
* End
*/

?>