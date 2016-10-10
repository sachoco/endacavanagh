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
 * @package Cavanagh
 */

get_header(); ?>

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
		<div class="go_to_cart"><a href="<?php echo $cart_url; ?>">go to cart</a></div>
	</header><!-- .entry-header -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_content(); ?>
			<div class="clear"></div>
		</main><!-- #main -->
		<div class="clear"></div>
	</div><!-- #primary -->
<?php if(!is_single( array( 5057 ) )): ?>
	<footer class="entry-footer">
		<div class="title">
			<div class="wrapper">
				<h3>Size & Finish Information</h3>
<!-- 				<div class="left">&nbsp;</div>
				<div class="right"><h3>Size & Finish Information</h3></div> -->
				<div class="clear"></div>
			</div>

		</div>
		
		<div class="wrapper">

			<div class="right">
				<h6>Limited Editions:</h6>
				<p>I sell my works in smaller affordable sizes in editions of 30 titled the Cycle of Life or stunning exclusive small editions titled Artist’s Choice.</p>

				<h6>CYCLE OF LIFE EDITIONS OF 30:</h6>
				<p>The naming of print sizes in the Cycle of Life refer to 3 of the Tree Life Stages. It is a wonderful way of connecting the sizes of the pictures with the timber materials used in the framing and is often reflected in my landscapes.</p>

				<h6>Cycle of Life Sizes:</h6>
				<p>Seed - The first stage a tree goes through in its life is a Seed. The Seed Print size is the smallest of the 3 available.</p>

				<p>Youth - The middle stage a tree goes through in its life is Youth. The Youth Print size is the medium size of the 3 available.</p>

				<p>Prime of Life - One of the later stages in a tree life cycle. It is now that the tree truly displays itself in all it’s glory. The Prime of Life Print size is the largest size of the 3 available.
				</p>
				<h6>Cycle of Life framing:</h6>
				<p>Floating Print Framed - An elegant contemporary choice. Borderless Hahnemühle Fine Art Pearl Print float mounted onto signed archival backing board. Framed with black stained Timber Frame.</p>

				<p>Prime of Life uses a deeper frame and float to give the piece a fantastic depth.<br>
				Mounted Print Framed with Timber Fillets - Hahnemühle Fine Art Pearl Print mounted onto signed archival mount board with an additional timber fillet. The timber fillet is a deep tapered timber surround which is placed directly behind the mount and giv	es the image a gorgeous classical appearance. Framed with black stained deep Timber Frame. Only available in Prime of Life size.</p>

				<p>Floating Print with Plywood Frame - Perfect for landscape images, this offers something quite unique and was completely designed by myself. Consisting of a borderless Hahnemühle Fine Art Pearl Print float mounted onto signed archival backing board. Framed with 85mm deep polished Birch Plywood Frame with clear Lacquer finish. Only available in Prime of Life size.</p>
			</div>
			<div class="left">
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-1.jpg" alt="">
				<div class="caption">Floating Print Framed (Cycle of Life Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-2.jpg" alt="">
				<div class="caption">Floating Print Framed (Cycle of Life Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-3.jpg" alt="">
				<div class="caption">Mounted Print With Timber Fillets (Cycle of Life Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-4.jpg" alt="">
				<div class="caption">Floating Print with Plywood Frame (Cycle of Life Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-5.jpg" alt="">
				<div class="caption">Floating Print with Plywood Frame (Cycle of Life Edition)</div>
			</div>

		</div>
		<div class="wrapper">

			<div class="right">
				<h6>Artists’s Choice</h6>
				<p>I offer many of my works in large sizes that are in small exclusive editions. These editions, titled Artist’s Choice are truly how I imagine my images to be seen during that precious moment when I capture a scene.</p>
				<p>I use the best printers in Ireland to produce breathtaking archival prints of amazing clarity and detail, which matches my high end photographic equipment and painstaking techniques.</p>

				<h6>Artist’s Choice Sizes:</h6>
				<p>The images can be sized to suit your space but 4 Artist’s choice sizes are available on my website. Artist’s choice A is the smallest possible size in the edition. Size D is the largest possible in a single physical piece. Additional ultra large sizes are possible and I have printed images up to 6m wide split into multiple pieces for a number of clients in the past for private and corporate clients. Please contact me for sizes over 3m.</p>

				<h6>Artist’s Choice finishes:</h6>
				<p>Hahnemühle Pigment ink Prints mounted on scratch resistant Diamond Polished Acrylic. The acrylic deflects the light to give an almost 3D affect. This frameless contemporary style is perfect for the home and corporate environment. Ideal for images which simply pop of the page. Hahnemühle Pigment ink Prints mounted on 3mm Dibond. A clear protective laminate is bonded to the print and finished with tray frames along the edges to give the piece an elegant look and depth. Ideal for black and white images or colour scenes with subtler tones. They exude a great sense of style and sophistication.</p>

			</div>
			<div class="left">
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-6.jpg" alt="">
				<div class="caption">Print mounted on scratch resistant Acrylic (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-7.jpg" alt="">
				<div class="caption">Print mounted on scratch resistant Acrylic (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-8.jpg" alt="">
				<div class="caption">Print mounted on 3mm Dibond (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-9.jpg" alt="">
				<div class="caption">Print mounted on 3mm Dibond (Artist’s Choice Edition)</div>
			</div>
		</div>
	</footer>
<?php endif; ?>
<?php get_footer(); ?>
