// get users a users a user is following
<?php
	$table_name = "wp_um_followers";
	$currentloggedinuser = get_current_user_id();
	$followers_query = $wpdb->get_results("SELECT ID, user_id1 FROM ".$table_name." WHERE user_id2 = '$currentloggedinuser' ") ?>

<?php	
	foreach ($followers_query as $follower) {
      echo $follower->user_id1.',';
}  
?>




// post loop by author
   <?php
    $args = array(
	    'author__in'=> array(2), //Authors's id's you like to include
        'post_type' => 'post'
    );

    $post_query = new WP_Query($args);
    $currentuser = get_current_user_id();
    $followerlist = 'hello';
	
    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            ?>
            <h2><?php the_title(); ?></h2> 
            <?php
						if ( get_current_user_id() == 3) {
							echo $followerlist;
						}
						else {
							echo 'not working';
						}
					?>
            <?php
            }
        }
?>
