<?php

/**

 * Single Product title

 *

 * @author  WooThemes

 * @package WooCommerce/Templates

 * @version 1.6.4

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly

}



?>

<?php //echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?>

<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>

