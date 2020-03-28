<?php

/*----------------------------------------------------*/
/*	Wrapping div to product details on shop page
/*----------------------------------------------------*/
add_filter('woocommerce_before_shop_loop_item_title', 'archive_product_wrap_before');

if (!function_exists('archive_product_wrap_before')) {
	function archive_product_wrap_before( $variable ) {
		echo "<div class=\"caption\"><div class=\"archive_product_wrap\">";
	return $variable;
	}
}

add_filter('woocommerce_after_shop_loop_item_title', 'archive_product_wrap_after');

if (!function_exists('archive_product_wrap_after')) {
	function archive_product_wrap_after( $variable ) {
		echo "</div></div>";
	return $variable;
	}
}

/*----------------------------------------------------*/
/*	Change number or products per row to 3
/*----------------------------------------------------*/
add_filter('loop_shop_columns', 'loop_columns');

if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/*----------------------------------------------------*/
/*	Display 12 products per page
/*----------------------------------------------------*/
add_filter( 'loop_shop_per_page', function( $cols) {return 12;}, 20 );


/* EOF */
?>