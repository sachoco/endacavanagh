<?php



/**



 * The Template for displaying product archives, including the main shop page which is a post type archive



 *



 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.



 *



 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).



 * will need to copy the new files to your theme to maintain compatibility. We try to do this.



 * as little as possible, but it does happen. When this occurs the version of the template file will.



 * be bumped and the readme will list any important changes.



 *



 * @see 	    http://docs.woothemes.com/document/template-structure/



 * @author 		WooThemes



 * @package 	WooCommerce/Templates



 * @version     2.0.0



 */







if ( ! defined( 'ABSPATH' ) ) {



	exit; // Exit if accessed directly



}







get_header( 'shop' ); ?>







	<?php



		/**



		 * woocommerce_before_main_content hook.



		 *



		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)



		 * @hooked woocommerce_breadcrumb - 20



		 */



		// do_action( 'woocommerce_before_main_content' );



	?>

	<header class="entry-header">
		<?php 
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<nav id="breadcrumbs">','</nav>');
			} 
		?>
		<?php
		global $woocommerce;
		$cart_url = $woocommerce->cart->get_cart_url();
		?>
		<div class="go_to_cart"><a href="<?php echo $cart_url; ?>">go to cart</a></div>	</header>





		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>







			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>







		<?php endif; ?>







		<?php



			/**



			 * woocommerce_archive_description hook.



			 *



			 * @hooked woocommerce_taxonomy_archive_description - 10



			 * @hooked woocommerce_product_archive_description - 10



			 */



			do_action( 'woocommerce_archive_description' );



		?>







		<?php if ( have_posts() ) : ?>















			<?php







				$product_categories = get_categories( apply_filters( 'woocommerce_product_subcategories_args', array(

					'parent'       => 0,

					'menu_order'   => 'ASC',

					'hide_empty'   => 0,

					'hierarchical' => 1,

					'taxonomy'     => 'product_cat',

					'pad_counts'   => 1

				) ) );







				?>



<div class="dropdown-select">
	<select name="orderby" class="orderby">
		<option value="">Select Category</option>
		<?php foreach ( $product_categories as $category ) : ?>
			<option value="<?php echo get_term_link( intval($category->term_id), 'product_cat' ); ?>" ><?php echo $category->name; ?></option>
		<?php endforeach; ?>
	</select>
</div>
<script>
	jQuery("select.orderby").on("change", function(e){
		window.location = jQuery(this).val();
	});
</script>


			<?php



				/**



				 * woocommerce_before_shop_loop hook.



				 *



				 * @hooked woocommerce_result_count - 20



				 * @hooked woocommerce_catalog_ordering - 30



				 */



				do_action( 'woocommerce_before_shop_loop' );



			?>

	<a class="buy-book" href="<?php echo get_permalink(5057) ?>">Buy Photo Book</a>
	<a class="buy-gift" href="<?php echo get_permalink(5955) ?>">Buy Gift Certificate</a>
	<?php echo get_product_search_form(); ?>
				<?php
				global $woocommerce;
				$cart_url = $woocommerce->cart->get_cart_url();
				?>





			<?php woocommerce_product_loop_start(); ?>







				<?php while ( have_posts() ) : the_post(); ?>







					<?php wc_get_template_part( 'content', 'product' ); ?>







				<?php endwhile; // end of the loop. ?>







			<?php woocommerce_product_loop_end(); ?>







			<?php



				/**



				 * woocommerce_after_shop_loop hook.



				 *



				 * @hooked woocommerce_pagination - 10



				 */



				do_action( 'woocommerce_after_shop_loop' );



			?>







		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>







			<?php wc_get_template( 'loop/no-products-found.php' ); ?>







		<?php endif; ?>







	<?php



		/**



		 * woocommerce_after_main_content hook.



		 *



		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)



		 */



		do_action( 'woocommerce_after_main_content' );



	?>







	<?php



		/**



		 * woocommerce_sidebar hook.



		 *



		 * @hooked woocommerce_get_sidebar - 10



		 */



		do_action( 'woocommerce_sidebar' );



	?>







<?php get_footer( 'shop' ); ?>



