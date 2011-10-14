<?php 

/*
	404
	Creates the iFeature 404 page.
	Copyright (C) 2011 CyberChimps
*/

/* Header call. */

	get_header(); 
	
/* End header. */

function chimp_yield($filter_name)
{
  $fname = dirname(__FILE__)."/templates/pro/$filter_name.php";
  $default_content = '';
  if(file_exists($fname))
  {
    ob_start();
    require($fname);
    $default_content = ob_get_clean();
  } 
  return apply_filters($filter_name, $default_content);
}

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