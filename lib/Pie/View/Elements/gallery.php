<!-- Home View -->

<div class="container">

<?php
echo '<div class="row">';
echo '<div class="span4">';
$images =& get_children( 'post_type=attachment&post_mime_type=image' );
if ( empty($images) ) {
	// no attachments here
} else {
	foreach ( $images as $image ) {
		echo wp_get_attachment_image( $image->ID, $size='featured-thumb' );
	}
}
echo '</div>';

echo '</div>';
?>

</div> <!-- end container -->

