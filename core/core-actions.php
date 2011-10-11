<?php

add_action('chimps_pagination', 'chimps_previous_posts');

function chimps_previous_posts() {
	$previous_text = apply_filters('chimps_previous_posts_text', '&laquo; Older Entries' );
	
	echo "<div class='next-posts'>";
	next_posts_link($previous_text);
	echo "</div>";

}

add_action('chimps_pagination', 'chimps_next_posts');

function chimps_next_posts() {
	echo "<div class='prev-posts'>";
	previous_posts_link('Newer Entries &raquo;');
	echo "</div>";

}

?>