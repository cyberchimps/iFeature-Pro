<?php 

/*
	404
	Creates the iFeature 404 page.
	Copyright (C) 2011 CyberChimps
*/

/* Header call. */

	get_header(); 
	
/* End header. */



/*
As an example of overriding theme content, imagine that this bit of code is in a different plugin. Perhaps a plugin that allows the admin to specify a custom 404 message without the need to alter theme files.

In this case, a custom message is pre-pended to the default content.

The plugin author registers his function with the chimp_404_content filter and can augment what the template designer created. Without ever touching the theme files.
*/
function my_custom_404_filter($default_content)
{
  return "<h1>Big Custom Message</h1>".$default_content;
}
add_filter('chimp_404_content', 'my_custom_404_filter');

?>

<div id="content_wrap">

	<div id="content_left">
	
		<div class="content_padding">
      <?= chimp_yield('chimp_404_content') ?>
		</div><!--end content_padding-->
		
	</div><!--end content_left-->

	<div id="sidebar_right">
		<?php get_sidebar(); ?>
	</div>
	
</div><!--end content_wrap-->

<div style=clear:both;></div><!--clear-->

<?php get_footer(); ?>