/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

(function($) {

  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        $(this).find("button.menu-toggle").on('click', function(){
          $(this).toggleClass('menu-opened');
          var mainmenu = $('#primary-menu');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
          }
          else {
            mainmenu.show().addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });

        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') 
        	multiTg();
        else 
        	cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');



        resizeFix = function() {

          if ($( window ).width() > 1024) {
            cssmenu.find('ul').show();
            cssmenu.find('.submenu-button').removeClass('submenu-opened');

            //sidebar menu
            if ($('#secondary #text-3').length) {
              $('#primary .sidebar-menu').detach().appendTo('#secondary #text-3 .textwidget');
            }
            if ($('#secondary #text-4').length) {
              $('#primary .sidebar-menu').detach().appendTo('#secondary #text-4 .textwidget');
            }

            //desktop menu - move search & subscribe back
            $('#menu-search').detach().insertBefore('#menu-social');
            $('#menu-subscribe').detach().insertBefore('#menu-social');
          }
          else {
            cssmenu.find('ul').hide().removeClass('open');

        	  //right sidebar menu
            if ($('#secondary #text-3').length) {
              $('#secondary #text-3 .textwidget .sidebar-menu').detach().prependTo('#primary .entry-content');
            }
            if ($('#secondary #text-4').length) {
              $('#secondary #text-4 .textwidget .sidebar-menu').detach().prependTo('#primary .entry-content');
            }

            //mobile menu - move search & subscribe to top
            $('#menu-search').detach().insertBefore('#menu-item-9');
            $('#menu-subscribe').detach().insertBefore('#menu-item-9');
          }

        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);


(function($){
  $(document).ready(function(){

  	//top menu - site navigation
    $("#site-navigation").menumaker({
       format: "multitoggle"
    });

    //custom search icon - woocomeerce search
    $('form.woocommerce-product-search input[type="submit"]').replaceWith('<button type="submit"><i class="fa fa-search"></i></button>');

    //smooth scroll for named anchors - got nothing to do with navigation script above, just added here to keep all JS in same place
/*	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
	        || location.hostname == this.hostname) {

	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	             $('html,body').animate({
	                 scrollTop: target.offset().top
	            }, 1000);
	            return false;
	        }
	    }
	});
*/	

  });


  $( '#product-cat-nav' ).on( 'change', function() {
      window.location.href = $(this).val();
  } );
  
})(jQuery);
