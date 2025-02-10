<?php

/**
 *
 *  wordpress will triger this file on plugins uninstall
 *
 * @package LalalandPlugin
 *
 */

 // make sure that WP_UNINSTALL_PLUGINS is init before initialization


if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data
$books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

foreach( $books as $book ) {
	wp_delete_post( $book->ID, true );
}



