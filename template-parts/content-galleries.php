<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cavanagh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
<?php
		$photo = get_field('photo', $post->ID);
		echo $photo[caption];

		$product_link = get_field('product_link');
		$product_post = get_post( $product_link[0] ); 
		$title = $product_post->post_title;
		// echo $title;
		$reference_number = get_field('reference_number');
		if($reference_number){
			echo "<br>".$reference_number;
		}
?>			
		</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
	            $product_link = get_field('product_link');
	            if ($product_link[0]) {
	              $product_link = get_permalink($product_link[0]);
	            }
	            else {
	              $product_link = '';
	            }
            	if ($product_link != "") {
					// $buybutton = '<a href="'.$product_link.'">buy</a>';
					$buybutton = '<a class="buy-btn-black" href="'.$product_link.'">buy</a>';
					echo $buybutton;
				}
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cavanagh_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

