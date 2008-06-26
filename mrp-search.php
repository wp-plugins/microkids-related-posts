<?php

	if( isset( $_GET['mrp_s'] ) ) {
	
	require('../../../wp-config.php');

	global $wpdb;
	$s = $wpdb->escape( $_GET['mrp_s'] );

	$query = "SELECT ID, post_title FROM $wpdb->posts WHERE post_title LIKE '%$s%' AND post_type = 'post' ORDER BY post_date DESC";
	$results = $wpdb->get_results( $query );
	
	if( $results ) {
	
		echo "<ul>";
		$n = 1;
		foreach( $results as $result ) {
			
			echo '<li';
			echo ( $n % 2 ) ? ' class="alt"' : '';
			echo '><a href="javascript:void(0)" id="result-'.$result->ID.'" class="MRP_result">'.$result->post_title.'</a> <a href="'.get_permalink( $result->ID ).'" title="View this post" class="MRP_view_post">&rsaquo;</a></li>';
			$n++;
		}
		echo "</ul>";
	
	}
}
?>
