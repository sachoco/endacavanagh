<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cavanagh
 */

?>

	</div><!-- #content -->
<?php if ( !is_front_page() && !is_home() ) { ?>
	<?php if (!is_page('portfolio')) { ?>
	<div id="btn-scroll-top"><a href="#top"><img src="<?php echo get_template_directory_uri(); ?>/images/btn-top.png" border="0" /></a></div>
	<?php } ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-container">
			<div class="site-info">
				&copy; 2008 - <?php echo date("Y"); ?> Enda Cavanagh
			</div><!-- .site-info -->
			<div class="footer-menu">
				<?php
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) );
				?>
			</div><!-- .footer-menu -->
			<div style="clear: both;"></div>
		</div>
	</footer><!-- #colophon -->
<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

   	<script type="text/javascript">

   		var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}};


		function showInfoBox(infotitle, infotext, refnum) {
			var title = infotitle;
			var text = Base64.decode(infotext);
			jQuery('body').append('<div id="infobox"><a style="float: right; color: #000;" href="javascript:hideInfoBox();"><i class="fa fa-2x btn-infoclose"></i></a></div>');
			jQuery('#infobox').append('<h3>'+title+'</h3>');
			if (refnum != 'undefined') {
				jQuery('#infobox').append('<h3>'+refnum+'</h3>');
			}
			jQuery('#infobox').append('<p class="infocontents">'+text+'</p>');
			jQuery('#infobox').fadeIn('slow');
		}

		function hideInfoBox() {
			jQuery('#infobox').remove();
		}

		jQuery(document).ready( function() {

			jQuery(window).scroll(function() {
			    if (jQuery(this).scrollTop() > 200) {
			        jQuery('#btn-scroll-top:hidden').stop(true, true).fadeIn();
			    } else {
			        jQuery('#btn-scroll-top').stop(true, true).fadeOut();
			    }
			});

			<?php if (is_page('portfolio')) { ?>

/*				jQuery("img.lazy").show().lazyload({
					event: "scrollstop",
					effect : "fadeIn"
				});
*/
				// /*Portfolio - Isotope masonry Layout*/
				// var grid = jQuery('#portfolio-container').isotope({
				// 	// set itemSelector so .grid-sizer is not used in layout
				// 	itemSelector: '.grid-item',
				// 	percentPosition: true,
				//   	masonry: {
				//     	// use element for option
				//     	columnWidth: '.grid-sizer',
				//   	}
				// });
				// grid.imagesLoaded().progress( function() {
				// 	grid.isotope('layout');
				// });


			<?php }//if portfolio ?>


			<?php if (is_shop()) { ?>

				/*Products - Isotope masonry Layout*/
				var grid = jQuery('body.woocommerce ul.products').isotope({
				  // set itemSelector so .grid-sizer is not used in layout
				  itemSelector: 'li.product',
				    masonry: {
					    gutterWidth: 10
					  }
				});
				grid.imagesLoaded().progress( function() {
					grid.isotope('layout');
				});


			<?php } //if is_shop ?>

				/*Fancybox for product page*/
				jQuery('body.single-product div.preview-wrapper a.fancybox').fancybox({
			        // padding    : 0,
			        margin     : 0,
			        nextEffect : 'fade',
			        prevEffect : 'fade',
			        autoCenter : false,
			        closeBtn   : false,
			        autoSize   : false,
    					helpers    : {
    					    title: {
    					        type: 'inside'
    					    }
    					},
			        afterLoad  : function (current, previous) {
  						var title_text = this.title;

						this.title = '<ul id="fancybox-bottom-links"><li><span style="color: #fff; font-size: 1.2em;">'+title_text+'</span></li><li class="btn-close"><a href="javascript:jQuery.fancybox.close(); hideInfoBox();"><img src="<?php echo get_template_directory_uri(); ?>/images/cross.png" border="0"></a></li></ul>';

			            jQuery.extend(this, {
			                aspectRatio : false,
			                type    : 'html',
			                width   : '100%',
			                height  : '100%',
			                content : '<div class="fancybox-image" style="background-color: #000; background-image:url(' + this.href + '); background-size: contain; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
			            });
			        }

			    });

				// jQuery('body.single-product div.images a').attr('rel', 'gallery').fancybox({
			 //        padding    : 0,
			 //        margin     : 0,
			 //        nextEffect : 'fade',
			 //        prevEffect : 'fade',
			 //        autoCenter : false,
			 //        closeBtn   : false,
			 //        autoSize   : false,
    // 					helpers    : {
    // 					    title: {
    // 					        type: 'inside'
    // 					    }
    // 					},
			 //        afterShow: function() {
			 //            jQuery('.fancybox-overlay').swipe({
			 //                swipe : function(event, direction) {
			 //                    if (direction === 'left') {
			 //                        jQuery.fancybox.next( direction );
			 //                    }
			 //                    else if (direction === 'right') {
			 //                        jQuery.fancybox.prev( direction );
			 //                    }
			 //                }
			 //            });

			 //        },
			 //        afterLoad  : function (current, previous) {
  		// 				var title_text = this.title;

				// 		this.title = '<ul id="fancybox-bottom-links"><li><span style="color: #fff; font-size: 1.2em;">'+title_text+'</span></li><li class="btn-close"><a href="javascript:jQuery.fancybox.close(); hideInfoBox();"><img src="<?php echo get_template_directory_uri(); ?>/images/cross.png" border="0"></a></li></ul>';

			 //            jQuery.extend(this, {
			 //                aspectRatio : false,
			 //                type    : 'html',
			 //                width   : '100%',
			 //                height  : '100%',
			 //                content : '<div class="fancybox-image" style="background-color: #000; background-image:url(' + this.href + '); background-size: contain; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
			 //            });
			 //        }

			 //    });


			/*Fancybox hack*/
			jQuery('#portfolio-container a').attr('rel', 'gallery').fancybox({
		        padding    : 0,
		        margin     : 0,
		        nextEffect : 'fade',
		        prevEffect : 'fade',
		        autoCenter : false,
		        closeBtn   : false,
		        autoSize   : false,
				helpers    : {
				    title: {
				        type: 'inside'
				    }
				},

		        afterShow: function() {
                	jQuery('html').addClass('fancybox-margin').addClass('fancybox-lock')
		            jQuery('.fancybox-wrap').swipe({
		                swipe : function(event, direction) {
		                    if (direction === 'left') {
		                        jQuery.fancybox.next( direction );
		                    }
		                    else if (direction === 'right') {
		                        jQuery.fancybox.prev( direction );
		                    }
		                }
		            });

		        },

	            afterClose: function() {
	              jQuery('html').removeClass('fancybox-margin').removeClass('fancybox-lock')
	            },

		        afterLoad  : function (current, previous) {

					var this_title 	= encodeURI(jQuery(this.element).find('img').attr('title'));
					var this_url 	= jQuery(this.element).find('img').attr('src');
					var this_url 	= jQuery(this.element).attr('data-posturl');
					var productlink = this.element.data('productlink');
					var refnum = this.element.data('refnumber');

					var highres = this.element.data('highres');

					var buybutton = '';

					if (productlink != "") {
						buybutton = '<li class="btn-buy"><a href="'+productlink+'"><img src="<?php echo get_template_directory_uri(); ?>/images/btn-buy.png" border="0"></a></li>';
					}

					this.title = '<ul id="fancybox-bottom-links"><li><a target="_blank" href="http://www.linkedin.com/shareArticle?url='+this_url+'&amp;title='+this_title+'"><i class="fa fa-2x fa-linkedin-square"></i></a></li><li><a target="_blank" href="http://www.facebook.com/sharer.php?u='+this_url+'"><i class="fa fa-2x fa-facebook"></i></a></li><li><a target="_blank" href="https://twitter.com/intent/tweet?text='+this_title+'&amp;url='+this_url+'&amp;via=endacavanagh"><i class="fa fa-2x fa-twitter"></i></a></li><li><a target="_blank" href="https://plus.google.com/share?url='+this_url+'"><i class="fa fa-2x fa-google-plus"></i></a></li><li><a href="mailto:?subject='+this_title+'&body='+this_url+'"><i class="fa fa-2x fa-envelope"></i></a></li>'+buybutton+'<li class="btn-info"><a href="javascript:showInfoBox(\''+jQuery(this.element).find('img').attr('title')+'\', \''+jQuery(this.element).find('div.portfolio-desc').html()+'\', \''+refnum+'\');"><img src="<?php echo get_template_directory_uri(); ?>/images/btn-info.png" border="0"></a></li><li class="btn-close"><a href="javascript:jQuery.fancybox.close(); hideInfoBox();"><img src="<?php echo get_template_directory_uri(); ?>/images/cross.png" border="0"></a></li></ul>';

		            jQuery.extend(this, {
		                aspectRatio : false,
		                type    : 'html',
		                width   : '100%',
		                height  : '100%',
		                content : '<div class="fancybox-image" style="background-color: #000; background-image:url(' + this.href + '); background-size: contain; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
		            });
		        }

		    });


			// jQuery('.fancybox-wrap').on("swipe", function(event, direction) {
			//     if (direction === 'left') {
			//         jQuery.fancybox.next( direction );
			//     }
			//     else if (direction === 'right') {
			//         jQuery.fancybox.prev( direction );
			//     }
			// });



			/*Hide infobox on any click*/
			jQuery(document).click(function() {
				hideInfoBox();
			});

			jQuery(document).keyup(function(e) {
			     if (e.keyCode == 27) { // escape key maps to keycode `27`
			        hideInfoBox();
			    }
			});


			/*
			function preload(arrayOfImages) {
			    $(arrayOfImages).each(function(){
			        $('<img/>')[0].src = this;
			        // Alternatively you could use:
			        // (new Image()).src = this;
			    });
			}

			// Usage:

			preload([
			    'img/imageName.jpg',
			    'img/anotherOne.jpg',
			    'img/blahblahblah.jpg'
			]);
			*/

		});

	</script>
	<?php
	/*
  	<script src="http://www.globalcatch.com/ENDA/wp-content/themes/cavanagh/js/jquery.lazyload.js?v=1.9.7"></script>
  	<script src="http://www.globalcatch.com/ENDA/wp-content/themes/cavanagh/js/jquery.scrollstop.js"></script>
  	*/
  	?>
	<?php /* <script type="text/javascript" src="http://www.globalcatch.com/ENDA/wp-content/themes/cavanagh/js/portfolio-layout.js"></script> */ ?>
</body>
</html>
