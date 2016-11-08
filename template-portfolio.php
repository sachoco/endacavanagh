<?php

/**

 * Template Name: Portfolio Page

 *

 * This is the template that displays Portfolio gallery.

 *

 * @package Cavanagh

 */



get_header(); ?>



  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.infinitescroll.min.js"></script>



  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <div id="filter-box"><div id="category-menu" ontouchstart=""><a href="javascript:void(0);" class="label">&gt; Select Category</a>

          <ul id="category-submenu">

            <li><a href="?cat=all">all</a></li>

          <?php



        $args = array(

          'type'                     => 'galleries',

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

        include_once 'template-portfolio-search.php';

      ?>

      </div>

    </main><!-- #main -->

  </div><!-- #primary -->

  <script type="text/javascript">

    jQuery(document).ready(function ( $ ) {

        var $container = $('#portfolio-container > .portfolio-container');
  

      $( "#search_form" ).on( "submit", function ( ev ) {

        ev.preventDefault();

        $("#search-btn i").removeClass("fa-chevron-right").addClass("fa-refresh fa-spin");


        // $container.load("/portfalio/?");
        $.get( "<?php echo get_site_url(); ?>/portfolio/", { search: $( "#s" ).val() } ).done(
        // $.get( "<?php echo get_site_url(); ?>/portfolio/", { cat: "<?php echo $cat ?>", search: $( "#s" ).val() } ).done(
          function ( response ) {



            var $elements = $(response).find('#portfolio-wrapper').children();



            $container.isotope( 'destroy' );
            $container.infinitescroll( 'destroy');

            $('#portfolio-wrapper').html( $elements );
            // $container.isotope( 'appended', $elements );
            $container = $('#portfolio-container > .portfolio-container');


            


            $elements.css({ opacity: 0 });

            var grid = $('#portfolio-container .portfolio-container').isotope({

              itemSelector: '.element',

              layoutMode: 'packery',

              masonry: {

                columnWidth: '.grid-sizer'

              }

            });


            grid.imagesLoaded( function() {

              $elements.animate({ opacity: 1 });

              grid.isotope('layout');

              setTimeout(function(){

                $(window).trigger('resize');

              }, 1000);

              $("#search-btn i").removeClass("fa-refresh fa-spin").addClass("fa-chevron-right");

            });
            $container.infinitescroll({

              navSelector  : ".next-posts-link",

              nextSelector : ".next-posts-link .next",

              itemSelector : ".element ",

              msgText: " ",

              loading: {

                  finishedMsg: 'No more pages to load.',

                  img: 'http://i.imgur.com/qkKy8.gif'

                }

              },

              // call Isotope as a callback

              function( newElements ) {

                $(newElements).css({ opacity: 0 });

                $(newElements).imagesLoaded(function(){

                  // show elems now they're ready

                  $(newElements).animate({ opacity: 1 });

                  $container.isotope( 'appended', $( newElements ) );

                  setTimeout(function(){

                    $(window).trigger('resize');

                  }, 1000);

                });

              }

            );
          }
          



        );
        // $.post(

        //   "<?php echo admin_url( 'admin-ajax.php' ) ?>",

        //   {

        //     action: "wpa56343_search",

        //     search: $( "#s" ).val()

        //   },

        //   function ( response ) {

        //     $("#portfolio-wrapper").html( response );

        //     var $elements = $('#portfolio-wrapper').find('.element');

        //     $elements.css({ opacity: 0 });

        //     var grid = jQuery('#portfolio-container .portfolio-container').isotope({

        //       itemSelector: '.element',

        //       layoutMode: 'packery',

        //       masonry: {

        //         columnWidth: '.grid-sizer'

        //       }

        //     });

        //     //grid.imagesLoaded().progress( function() {

        //     grid.imagesLoaded( function() {

        //       $elements.animate({ opacity: 1 });

        //       grid.isotope('layout');

        //       setTimeout(function(){

        //         $(window).trigger('resize');

        //       }, 1000);

        //       $("#search-btn i").removeClass("fa-refresh fa-spin").addClass("fa-chevron-right");

        //     });

        //   }

        // );

      });






      $container.infinitescroll({

        navSelector  : ".next-posts-link",

        nextSelector : ".next-posts-link .next",

        itemSelector : ".element ",

        msgText: " ",

        loading: {

            finishedMsg: 'No more pages to load.',

            img: 'http://i.imgur.com/qkKy8.gif'

          }

        },

        // call Isotope as a callback

        function( newElements ) {

          $(newElements).css({ opacity: 0 });

          $(newElements).imagesLoaded(function(){

            // show elems now they're ready

            $(newElements).animate({ opacity: 1 });

            $container.isotope( 'appended', $( newElements ) );

            setTimeout(function(){

              $(window).trigger('resize');

            }, 1000);

          });

        }

      );

    });

  </script>



<?php get_sidebar(); ?>

<?php get_footer(); ?>

