<?php
/**
 * Template part for displaying single projects.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cavanagh
 */

 $album = get_post_meta( get_the_ID(), 'album', false );
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php the_content(); ?>

		<div class="project-wrapper">
	      <p><a class="show-info" href="#">Info</a> <?php the_title(); ?></p>
	      <div class="project-description">
	        <a class="close-modal" href="#">&times;</a>
	        <h1><?php the_title(); ?></h1>
	        <?php the_content(); ?>
	        </div>
	      <ul class="project-photos">
	        <?php if( has_post_thumbnail() ): ?>
	          <li data-src="<?php the_post_thumbnail_url( 'full' ); ?>"><img src="<?php the_post_thumbnail_url( 'project-thumbnail' ); ?>" data-original="<?php the_post_thumbnail_url( 'full' ); ?>" /></li>
	        <?php
	          endif;
	          foreach( $album as $photo_data ):
	            $url = wp_get_attachment_image_src( $photo_data[ 'image' ], 'full' );
	            $thumburl = wp_get_attachment_image_src( $photo_data[ 'image' ], 'project-thumbnail' );
	            $title = $photo_data[ 'title' ];
	            ?>
	              <li data-src="<?php echo $url[0]; ?>">
	                <img src="<?php echo $thumburl[0]; ?>" data-original="<?php echo $url[0]; ?>" alt="<?php echo $title; ?>" />
	              </li>
	            <?php
	          endforeach;
	        ?>
	      </ul>
	      <div class="additional-description" style="display: none;">
	        <?php the_content(); ?>
        </div>
	    </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cavanagh_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<script>
	if(jQuery('body').is('.single.single-projects')) {
		jQuery(document).ready(function(){
		  jQuery('.project-photos').lightGallery();
		});
		jQuery(document).on('click', '.show-info', function(ev) {
		  ev.preventDefault();
		  var $container = jQuery(this).closest('.project-wrapper');
		  $container.find('.project-description').addClass('is-open');
		  jQuery('body').append('<div class="overlay"></div>');
		});
		var closeModal = function() {
		  jQuery('.is-open').removeClass('is-open');
		  jQuery('.overlay').remove();
		}
		jQuery(document).on('click', '.close-modal', function(ev) {
		  ev.preventDefault();
		  closeModal();
		});
		jQuery(document).on('click', '.overlay', function() {
		  closeModal();
		});
		jQuery(document).on('touchstart', '.overlay', function() {
		  closeModal();
		});
	}
</script>

