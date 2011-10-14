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
This is the master function that gets called from everywhere you want to allow theme hooks.

By default, it searches the child theme folder for a file with the same name as the filter. But after that, it calls the filter so in theory other plugins can override theme content if necessary.
*/
function chimp_yield($filter_name)
{
  $fname = dirname(__FILE__)."/child_themes/pro/$filter_name.php";
  $default_content = '';
  if(file_exists($fname))
  {
    ob_start();
    require($fname);
    $default_content = ob_get_clean();
  } 
  return apply_filters($filter_name, $default_content);
}

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