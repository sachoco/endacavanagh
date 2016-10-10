<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cavanagh
 */

get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightgallery.min.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/lightgallery-all.js"></script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lightgallery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-fullscreen.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-thumbnail.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-video.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-autoplay.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-zoom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-hash.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lg-pager.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.min.js"></script>
<script>
	jQuery(document).ready(function(){
		
		jQuery('.fire-modal').lightGallery();
	});
</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
					get_template_part( 'template-parts/content', 'galleries' );
			?>

			<?php the_post_navigation(); ?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
