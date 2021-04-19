<?php
    $args = array(
	    'author__in'=> array(1,2,3,4,5,6,7,8,9,10), //Authors's id's you like to include
        'post_type' => 'post'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
        while($post_query->have_posts() ) {
            $post_query->the_post();
            ?>
            <h2><?php the_title(); ?></h2>
            <?php
            }
        }
?>
