// Worpress comments template in Blog Post Loop a Page
<?php
// Arguments for the query
$args = array();

// The comment query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

comments_popup_link( __( 'Leave a comment', 'text-domain' ), __( '1 Comment', 'text-domain' ), __( '% Comments', 'text-domain' ) );
// The comment loop
if ( !empty( $comments ) ) {
    foreach ( $comments as $comment ) {
        echo '<p>' . $comment->comment_form . '</p>';
    }
    
} else {
    echo 'No comments found.';
}	
				?>

// Loads comment template in Blog Post Loop
<?php $withcomments = 1; comments_template(); ?>
