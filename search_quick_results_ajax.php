// HTML can be placed for example on a page - there is also a version for search.php here https://wordpress.stackexchange.com/questions/240138/ajax-live-search-for-post-title
<?php
<input type="text" name="keyword" id="keyword" onkeyup="fetch()"></input>
<div id="datafetch">Search results will appear here</div>
?>

// Javascript goes into the functions.php of the theme
<?php
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
    });
}
</script>

<?php
}
?>

// AJAX call goes into the functions.pho of the theme
<?php
// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            
            <h2><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a><?php the_content(); ?></h2>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}v
?>
