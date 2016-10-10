<?php

/**

 * Template Name: Projects Page

 *

 * This is the template that displays Projects list.

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

      jQuery('.project-photos').lightGallery();

    });
    // jQuery(document).on('click', '.project-wrapper', function(ev) {
    jQuery(document).on('click', '#portfolio-wrapper .info', function(ev) {
      ev.preventDefault();
      // var $container = jQuery(this).find('.project-photos');
      var $container = jQuery(this).parent().find('.project-photos');

      $container.find("li:first-child").trigger("click");

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

  </script>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <div id="filter-box"><div id="category-menu"><a href="javascript:void(0);" class="label">&gt; Select Category</a>

          <ul id="category-submenu">

            <li><a href="?cat=all">all</a></li>

          <?php



        $args = array(

          'type'                     => 'projects',

          'child_of'                 => 0,

          'parent'                   => '',

          'orderby'                  => 'name',

          'order'                    => 'ASC',

          'hide_empty'               => 0,

          'hierarchical'             => 1,

          'exclude'                  => '1',

          'include'                  => '',

          'number'                   => '',

          'taxonomy'                 => 'category',

          'pad_counts'               => false

        );



            $cats = get_categories($args);

            //print_r($cats);

            foreach ($cats as $cat) {

              echo '<li><a href="?cat='.$cat->slug.'">'.$cat->name.'</a></li>';

            }

          ?>

          </ul>

        </div><div id="custom-search"><span class="label">&gt; Custom Search</span><div id="search-box"><form name="search_form" id="search_form"><input name="s" id="s" type="text" placeholder="type in keyword (location, name of place etc...)" /><button id="search-btn" type="submit" name="submit"><i class="fa fa-chevron-right"></i></button></form></div></div><div style="clear: both;"></div></div>

      <div id="portfolio-wrapper">

      <?php

        include_once 'template-projects-search.php';

      ?>

      </div>

    </main><!-- #main -->

  </div><!-- #primary -->

  <script type="text/javascript">

    jQuery(document).ready(function ( $ ) {

      $( "#search_form" ).on( "submit", function ( ev ) {

        ev.preventDefault();

        $("#search-btn i").removeClass("fa-chevron-right").addClass("fa-refresh fa-spin");

        $.post(

          "<?php echo admin_url( 'admin-ajax.php' ) ?>",

          {

            action: "wpa56344_search",

            search: $( "#s" ).val()

          },

          function ( response ) {

            $("#portfolio-wrapper").html( response );

            var $elements = $('#portfolio-wrapper').find('.element');

            $elements.css({ opacity: 0 });

            var grid = jQuery('#portfolio-container .portfolio-container').isotope({

              itemSelector: '.element',

              layoutMode: 'packery',

              masonry: {

                columnWidth: '.grid-sizer'

              }

            });

            //grid.imagesLoaded().progress( function() {

            grid.imagesLoaded( function() {

              $elements.animate({ opacity: 1 });

              grid.isotope('layout');

              setTimeout(function(){

                $(window).trigger('resize');

              }, 1000);

              $("#search-btn i").removeClass("fa-refresh fa-spin").addClass("fa-chevron-right");

            });

          }

        );

      });

    });

  </script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

