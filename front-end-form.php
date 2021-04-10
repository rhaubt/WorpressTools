// https://itsmereal.com/frontend-post-submission-edit-advanced-custom-fields/

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package um-theme
 */
global $defaults;
get_header();

if ( is_user_logged_in() || current_user_can('publish_posts') ) { // Execute code if user is logged in
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header(); ?>

<div id="primary" class="site-main">
	<div class="boot-col-md-12 page-content">
	<div class="website-canvas">
	<div class="boot-row">
	<main id="main" class="content-area single-page__content <?php um_determine_single_content_width();?>" tabindex="-1" role="main">

		<?php do_action( 'um_theme_before_page_content' );?>

		<?php
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
				while ( have_posts() ) : the_post();
					// Elementor `single` location
					get_template_part( 'template-parts/content', 'page' ); ?>
					
					<?php if ( ! ( is_user_logged_in() || current_user_can('publish_posts') ) ) {
    echo '<p>You must be a registered author to post.</p>';
} else {
     acf_form(array(
         'post_id' => 'new_post',
         'field_groups' => array(6,11), // Used ID of the field groups here.
         'post_title' => true, // This will show the title filed
         'post_content' => true, // This will show the content field
         'form' => true,
         'new_post' => array(
             'post_status' => 'publish' // You may use other post statuses like draft, private etc.
         ),
         'return' => '%post_url%',
         'submit_value' => 'Submit Book',
     ));
}
?>

				<?php endwhile;
			}
		?>

		<?php
			/**
			 * Functions hooked in to um_theme_after_page_content action
			 *
			 * @hooked um_theme_output_page_comments - 10
			 */
			do_action( 'um_theme_after_page_content' );
		?>

	</main>
	<?php get_sidebar();?>
</div>
</div>
</div>
</div>

<?php
get_footer();
