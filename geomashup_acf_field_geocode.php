<?php // GeoMashup use ACF Custom Field and GeoMashup will geocode the field

// tick copy geolocation field and inster ACF Field name in Geomashup > General Settings form field. not sure if below code is needed in functions.php
function my_action_added_post_meta( $meta_id, $post_id, $meta_key, $meta_value ) {
if ( class_exists( 'GeoMashupDB' ) and 'guide-postcode' == $meta_key ) {
$full_address = get_post_meta( $post_id, 'guide-address', true ) . ', ' . $meta_value;
$location = GeoMashupDB::blank_location( ARRAY_A );
GeoMashupDB::geocode( $full_address, $location );
GeoMashupDB::set_object_location( 'post', $post_id, $location, null );
}
}
add_action( 'added_post_meta', 'my_action_added_post_meta', 10, 4 );
add_action( 'added_postmeta', 'my_action_added_post_meta', 10, 4 ); // Covers AJAX calls
?>
