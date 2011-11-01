 <?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

?>

<?php get_header(); ?>

<div id="content_wrap">
		
	<?php chimps_index_before_entry(); ?>
	
	<?php chimps_index_entry(); ?>

		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--Call the Loop-->
			<?php chimps_index_loop(); ?>
				
		<?php endwhile; ?>
		
		<!--Call @Core pagination-->
		<?php chimps_pagination(); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div> <!--end content_padding-->
	</div> <!--end content_left-->

<?php chimps_index_after_entry(); ?>

</div><!--end content_wrap-->
<div style="clear:both;"></div>

<?php get_footer(); ?>