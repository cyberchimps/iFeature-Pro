 <?php

 /*
	Index
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

?>

<?php get_header(); ?>

<div id="content_wrap">
		
	<!--Begin @Core index before entry hook-->	
	<?php chimps_index_before_entry(); ?>
	<!--End @Core index before entry hook-->
	
	<!--Begin @Core index entry hook-->
	<?php chimps_index_entry(); ?>
	<!--End @Core index entry hook-->

		<div class="content_padding">
		
			<!--Begin @Core index loop hook-->
			<?php chimps_index_loop(); ?>
			<!--End @Core index loop hook-->	

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