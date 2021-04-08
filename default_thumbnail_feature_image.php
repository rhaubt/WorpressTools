//* Set default post thumbnail works with Default Feature Image plugin
add_filter( 'dfi_thumbnail_id', 'rv_conditional_default_thumbnails' );
function rv_conditional_default_thumbnails( $object_id ) {

	if ( has_tag( 'Albania' ) ) {
		$object_id = 108;
	} elseif ( has_tag( 'Afghanistan' ) ) {
		$object_id = 107;
	} elseif ( has_tag( 'United States of America (USA)' ) ) {
		$object_id = 331;
	}

	return $object_id;

}
