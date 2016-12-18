<?php
/**
 * Template Name: Size & Finish Information
 *
 * This is the template that displays Size & Finish Information.
 *
 * @package Cavanagh
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

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
			<div class="right">
				<h6>LIMITED EDITIONS:</h6>
				<p>I sell my works in smaller affordable sizes in editions of 30, titled the Cycle of Life or stunning
exclusive small editions titled Artist’s Choice.</p>

				<h6>Cycle of Life Editions of 30:</h6>
				<p>The naming of print sizes in the Cycle of Life refer to 3 of the Tree Life Stages. It is a wonderful way
of connecting the sizes of the pictures with the timber materials used in the framing and is often
reflected in my landscapes.</p>

				<h6>Cycle of Life Sizes:</h6>
				<p>Seed - The first stage a tree goes through in its life is a Seed. The Seed Print size is the smallest of
the 3 available. A floating Print Framed is the Framing used in this size.</p>

				<p>Youth - The middle stage a tree goes through in its life is Youth. The Youth Print size is the medium size of the 3 available.A floating Print Framed is the Framing used in this size.</p>

				<p>Prime of Life - One of the later stages in a tree life cycle. It is now that the tree truly displays itself in all it’s glory. The Prime of Life Print size is the largest size of the 3 available. A number of framing
options are available in the Prime of Life size.
				</p>
                
				<h6>Cycle of Life Framing:</h6>
                <p>Prime of Life uses a deeper frame and float to give the piece a fantastic depth.</p>
                
				<p>Floating Print Framed - An elegant contemporary choice. Borderless Hahnemühle Fine Art Pearl
Print float mounted onto signed archival backing board. Framed with black stained Timber Frame.</p>

				<p>Hahnemühle Fine Art Pearl Print mounted onto signed archival mount board with an additional timber fillet. The timber fillet is a deep tapered timber surround which is placed directly behind the mount and gives the image a gorgeous classical appearance. Framed with black stained deep Timber Frame. Only available in Prime of Life size.</p>

				<p>The ultimate in style and quality when displaying my Cycle of Life pieces. This offers something quite unique and was completely designed by myself. Consisting
of a borderless float mounted Hahnemühle Fine Art Pearl Print. Framed with 85mm deep clear Birch Plywood Frame with clear satin finish. Additionally my forest Prime of Life works only come with high quality anti Reflective Museum Glass. The Glass becomes almost invisible while offering 99% UV protection. Only available in Prime of Life size.</p>
			</div>
		</div>
		<div class="wrapper">
			<div class="left">
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-6.jpg" alt="">
				<div class="caption">Print mounted on scratch resistant Acrylic (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-7.jpg" alt="">
				<div class="caption">Print mounted on scratch resistant Acrylic (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-8.jpg" alt="">
				<div class="caption">Print mounted on 3mm Dibond (Artist’s Choice Edition)</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/finishing/finishing-9.jpg" alt="">
				<div class="caption">Print mounted on 3mm Dibond (Artist’s Choice Edition)</div><br /><br />
			</div>
			<div class="right">
				<h6>Artists’s Choice:</h6>
				<p>I offer many of my works in large sizes that are in small exclusive editions. These editions, titled
Artist’s Choice is truly how I imagine my images to be seen during that precious moment when I capture a scene.</p>
				<p>I use the best printers in Ireland to produce breathtaking archival prints of amazing clarity and detail, which matches my high end photographic equipment and painstaking techniques.</p>
                
                	<h6>Artist’s Choice Finishes:</h6>
				<p>Hahnemühle Pigment ink Prints mounted on scratch resistant Diamond Polished Acrylic. The acrylic
deflects the light to give an almost 3D affect. This frameless contemporary style is perfect for the home and corporate environment. Ideal for images which simply pop of the page.</p> 
<p>Hahnemühle Pigment ink Prints mounted on 3mm Dibond. A clear protective laminate is bonded to the print and finished with tray frames along the edges to give the piece an elegant look and depth. Ideal for black and white images or colour scenes with subtler tones. They exude a great sense of
style and sophistication.</p>

				<h6>Artist’s Choice Sizes:</h6>
				<p>The images can be sized to suit your space but 4 Artist’s choice sizes are available on my website.
Artist’s choice A is the smallest possible size in the edition. Size D is the largest possible in a single
physical piece. Additional ultra large sizes are possible and I have printed images up to 6m wide split into multiple pieces for a number of clients in the past for private and corporate clients. Please contact me for sizes over 3m.</p>

<h6>Shipping:</h6>
				<p>Shipping is usually calculated when ordering. For multiples of Artist’s Choice please <a href="mailto:photos@endacavanagh.com" target="_blank">contact</a> for shipping estimate.</p>

			

		  </div>
		</div>
	</footer>
<?php get_footer(); ?>
