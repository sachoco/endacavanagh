<?php

/**

 * Template Name: Projects Search

 *

 * This is the template that displays Projects search results.

 *

 * @package Cavanagh

 */



$args = array(

  'numberposts' => -1,

  'posts_per_page' => -1,

   'post_type' => 'projects',

    'orderby' => 'menu_order',

    'order' => 'ASC',

    's' => wp_unslash( ( string ) $_POST['search'] ),

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





$query = new WP_Query( $args );



while( $query->have_posts() ):

  $query->the_post();



  $album = get_post_meta( get_the_ID(), 'album', false );

  ?>

    <div class="project-wrapper">

      <div class="info">
        <a class="show-info" href="#">Info</a> 
        <?php the_title(); ?><br>
        <div class="desc">
          <?php the_content(); ?>
        </div>
      </div>

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

    </div>

  <?php



endwhile;

