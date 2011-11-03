<?php 

/*
	Single
	
	Establishes the single post template of iFeature. 
	
	Copyright (C) 2011 CyberChimps
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	

	$showfblike	= $options[$themeslug.'_show_fb_like'];
	$showgplus		= $options[$themeslug.'_show_gplus'];

/* End variable definition. */	


get_header(); ?>

<div id="content_wrap">
	
	<div id="content_wrap">
		
	<!--Begin @Core index before entry hook-->	
	<?php chimps_index_before_entry(); ?>
	<!--End @Core index before entry hook-->

		<div class="content_padding">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post_container">
		
				<!--Begin @Core index loop hook-->
					<?php chimps_index_loop(); ?>
				<!--End @Core index loop hook-->	
			
				<!--Begin @Core link pages hook-->
					<?php chimps_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php chimps_edit_link(); ?>
				<!--End @Core post edit link hook-->
			
				<!--Begin @Core FB like hook-->
					<?php chimps_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
			
				<!--Begin @Core post tags hook-->
					<?php chimps_post_tags(); ?>
				<!--End @Core post tags hook-->
			
				<!--Begin @Core post bar hook-->
					<?php chimps_post_bar(); ?>
				<!--End @Core post bar hook-->
			
			</div><!--end post_container-->
	
		<?php endwhile; ?>
		
		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		
			<!--Begin @Core pagination hook-->
			<?php chimps_pagination(); ?>
			<!--End @Core pagination loop hook-->
			
		</div> <!--end content_padding-->
	</div> <!--end content_left/fullwidth-->

	<!--Begin @Core index after entry hook-->
	<?php chimps_index_after_entry(); ?>
	<!--End @Core index after entry hook-->

</div><!--end content_wrap-->
<div style="clear:both;"></div>

<?php get_footer(); ?>