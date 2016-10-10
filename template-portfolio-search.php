<?php
/**
 * Template Name: Portfolio Search
 *
 * This is the template that displays Portfolio search results.
 *
 * @package Cavanagh
 */


	global $wp_query; // will be reset to get pagination to work




          $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

          	if($_POST['search']){
          		$s = $_POST['search'];
          	}else if($_GET['search']){
          		$s = $_GET['search'];
          	}
        	$args = array(
        	'posts_per_page' => 15,
          // 'numberposts' => -1,
        	 'post_type' => 'galleries',
          	'orderby' => 'menu_order date',
          	'order' => 'ASC',
  	      	's' => wp_unslash( ( string ) $s ),
            'paged' => $paged,
        	);

      	$cat = '';
      	if (isset($_GET['cat']) && ($_GET['cat']!="")) {
      		$cat = $_GET['cat'];
      		if ($cat != "all") {
  				  $args['tax_query'] = array(
  						array(
  							'taxonomy' => 'category',
  							'field' => 'slug',
  							'terms' => $cat
  						)
  					);
      		}
      	}


      	$tempQuery = $wp_query;

		$wp_query = null;
        $wp_query = new WP_Query();
        foreach( $args as $key => $data )
        {
        	$wp_query->set( $key, $data );
        }
        $wp_query->get_posts();

        if($wp_query->have_posts()) {

        	//wrappers basedon oshine's code
        	echo '<div id="portfolio-container" class="portfolio full-screen full-screen-gutter masonry_disable style1-gutter five-col" data-action="get_ajax_full_screen_gutter_portfolio" data-category="" data-masonry="0" data-showposts="13" data-paged="2" data-col="five" data-gallery="0" data-filter="portfolio_categories" data-show_filters="no" data-thumbnail-bg-color="rgba(0,0,0,0.9)" data-thumbnail-bg-gradient="" data-title-style="style4" data-cat-color="#f4f4f4" data-title-color="#ffffff" data-title-animation-type="none" data-cat-animation-type="none" data-hover-style="style1-hover" data-gutter-width="5" data-img-grayscale="c_to_c" data-image-effect="zoom-in" data-gradient-style-color="" data-cat-hide="0"><div class="portfolio-container">'; //'<div class="grid-sizer"></div>';
        	while( $wp_query->have_posts() ): $wp_query->the_post();

                $currentPostLink = get_permalink(); // ALFY THIS IS URL FOR SHARING
	            $photo = get_field('photo');
	            $thumb = get_field('thumbnail');
	            $size = get_field('photo_size');
	            $product_link = get_field('product_link');
	            if ($product_link[0]) {
	              $product_link = get_permalink($product_link[0]);
	            }
	            else {
	              $product_link = '';
	            }

	            //echo "<!--".print_r($product_link, true)."-->";
	            //echo "<!-- photo: ".print_r($photo, true)."-->";
	            //echo "<!-- thumb: ".print_r($thumb, true)."-->";

	            $reference_number = get_field('reference_number');

	            //$photo_title = htmlentities(addslashes(get_post_field('post_title', $post->ID)));
	            $post_content = base64_encode(get_the_content());

	            $element_size = 'normal';

	            switch ($size) {

	              case 'double':
	                $element_size = 'wide wide-width-height';
	                break;

	              case 'panorama':
	                $element_size = 'wide wide-width';
	                break;

	              case 'tall':
	                $element_size = 'no-wide wide-height';
	                break;

	              default:
	                $element_size = 'no-wide no-wide-width-height';
	                break;
	            }

	            echo '<div class="element '.$element_size.'"><div class="element-inner"><div class="flip-wrap"><div class="flip-img-wrap none-effect img-loaded">';
	            if ($thumb) {
		            ?>
		            <a data-posturl="<?php echo $currentPostLink; ?>" class="portfolio-item" data-productlink="<?php echo $product_link; ?>" data-refnumber="<?php echo $reference_number; ?>" data-lowres="<?php echo $thumb['sizes']['masonry-thumbnail']; ?>" data-highres="<?php echo $photo['url']; ?>" href="<?php echo $photo['url']; ?>" rel="gallery"><div style="display: none;" class="portfolio-desc"><?php echo $post_content; ?></div><img data-original="<?php echo $photo['url']; ?>" src="<?php echo $thumb['sizes'][$size]; ?>" alt="<?php echo addslashes($photo['alt']); ?>" title="<?php echo addslashes($photo['caption']); ?>" class="lazy grid-item portfolio-image originalthumb <?php echo $size; ?>" /></a>
		            <?php
	            }
	/*            else {
	              if ($photo) {
		              ?>
		              <a class="portfolio-item" data-productlink="<?php echo $product_link; ?>" data-refnumber="<?php echo $reference_number; ?>" data-lowres="<?php echo $photo['sizes'][$size]; ?>" data-highres="<?php echo $photo['sizes'][$size]; ?>" href="<?php echo $photo['url']; ?>"><div style="display: none;" class="portfolio-desc"><?php echo $post_content; ?></div><img data-original="<?php echo $photo['sizes'][$size]; ?>" src="<?php echo $photo['sizes'][$size]; ?>" alt="<?php echo addslashes($photo['alt']); ?>" title="<?php echo addslashes($photo['caption']); ?>" class="lazy grid-item portfolio-image <?php echo $size; ?>" /></a>
		              <?php
	              }
	        	}
	*/            echo '</div></div></div></div>';

        	endwhile;
        	echo '</div></div>';
          ?>
            <div class="next-posts-link">
              <?php the_posts_pagination( array(
				    'mid_size' => 2,
				    'prev_text' => __( 'Back', 'textdomain' ),
				    'next_text' => __( 'Onward', 'textdomain' ),
				) ); ?>
            </div>
          <?php
          $wp_query = null; $wp_query = $tempQuery;
          wp_reset_postdata();
          wp_reset_query();
        }
        else
        {
        	echo 'None';
        }

      ?>
