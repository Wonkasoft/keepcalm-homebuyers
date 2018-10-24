<?php
/**
 * This file is for any aditions of custom features for woocommerce.
 *
 * @since 2.0.0
 */

function get_hooks( $tag ) {
    global $wp_current_filter;
    global $debug_tags;
    global $found_filters;

    if ( in_array( $tag, $debug_tags ) ) {
    	return;
    }
    $debug_tags[] = $tag;
    if ( ! in_array( $tag, $found_filters ) ) {
    	array_push( $found_filters, $tag );
	   	echo '<span class="found-hook" style="position: relative; display: inline-block; clear: both; z-index: 50; margin: 8px; height: 16px; padding: 8px 15px; background: #555555; color: #fff; border-radius: 4px;"><i class="fa fa-crosshairs" style="position: relative; left: -3px;" aria-hidden="true"></i> ' . $tag . '</span>';
    }

}

// add_action( 'views_edit-product', 'hook_display', 999 );

function hook_display() {
	add_action( 'all', 'get_hooks', 999 );
	
}

// add_action( 'pa_color_add_form', 'get_attributes', 999 );
/**
 * This function can be used to insert terms in a bulk string of attribute values.
 *
 * 
 */
function get_attributes( $something ) {
	$taxonomies = get_taxonomies();
	$new_values = ''; // add string

	$new_values = explode( ',',$new_values, 200);

	foreach ($taxonomies as $taxon ) {
		if ($taxon == 'pa_color' ) {
			$new_terms = get_terms( $taxon );
			foreach ( $new_values as $value ) {
				wp_insert_term( $value, $taxon );
			}
				var_dump( $new_terms );
		}
	}
}

// add_action( 'views_edit-product', 'wonkasoft_get_products', 999 );

function wonkasoft_get_products() {
	$args = array(
		'price'	=>	0,
	);

	$get_products = new WC_Product_Query( $args );
	
	var_dump($get_products);
	// if ( $get_products->have_posts() ) : while ( $get_products->have_posts() ) : $get_products->the_post();
	// 	$current_product = get_post();
	// 	var_dump($current_product);
	// 	endwhile;
	// endif;
	// foreach ($get_products as $current_product ) {
	// 	if ($current_product['price'] == 0 ) {
	// 		var_dump($current_product);

	// 	}
	// }

}

// add_action( 'init', 'wonka_delete_variations_with_no_parent', 10 );

function wonka_delete_variations_with_no_parent() {
 
    $variations = new WP_Query( array(
        'post_type' => 'product_variation',
        'posts_per_page' => -1
    ) );
 
    if ( $variations->have_posts() ) {
 
        while ( $variations->have_posts() ) {
            $variations->the_post();
 
            $parent = wp_get_post_parent_id( get_the_id() );
 
            if ( false === get_post_status( $parent ) ) {
                wp_delete_post( get_the_id(), true );
            }
 
        }
 
    }
 
    wp_reset_postdata();
 
}

function wonkasoft_bulk_edit_terms( $actions ) {
	var_dump($actions);

	return $actions;
}

add_filter( 'the_category', 'wonkasoft_bulk_edit_terms' );