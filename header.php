<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cavanagh
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="paMekdgaIqWUPflcVYN9xHCB8G-NP03RVY3coT7OHOU" />

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php 

if (is_page()) {
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
?>
	<style type="text/css">
		body {
			background: none;
			background-image: url("<?php echo $large_image_url[0]; ?>");
			background-repeat: no-repeat;
			background-size: 100% auto;
		}
	</style>
<?php
}//if page
?>
<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700|Rajdhani:400,500,600,700|Open+Sans:300' rel='stylesheet' type='text/css'>

<script>   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');    ga('create', 'UA-4883073-1', 'auto');   ga('send', 'pageview');  </script>
<!-- Facebook Pixel Code --> <script> !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n; n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '1045954468813289'); // Insert your pixel ID here. fbq('track', 'PageView'); </script> <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1045954468813289&ev=PageView&noscript=1" /></noscript> <!-- DO NOT MODIFY --> <!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>
<a name="top"></a>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cavanagh' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/enda_logo.png" alt="<?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?>" align="left" /></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/enda_logo.png" alt="<?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?>" align="left" /></a></p>
			<?php endif; ?>
			<!--<p class="site-description"><?php bloginfo( 'description' ); ?></p>-->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars fa-3x"></i></button>
			<?php 
$search = '
<li id="menu-search" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-15"><a href="#"><i class="fa fa-search"></i></a>
<ul class="sub-menu">
	<li id="search" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-284"><a><form method="get" action="/"><input name="s" type="text" size="20" placeholder="type in keyword..." class="topmenu-search-field"><button type="submit" class="topmenu-search-button"><i class="fa fa-search"></i></button></form></a></li>
</ul>
</li>';
// $subscribe = '
// <li id="menu-subscribe" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-16"><a href="#">subscribe   </a>
// <ul class="sub-menu">
// 	<li id="subscribe" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-286">

// 	<a href="#"><form><input name="email" type="text" size="20" placeholder="your email..." class="topmenu-subscribe-field"><button type="submit" class="topmenu-subscribe-button"><i class="fa fa-paper-plane-o"></i></button></form></a>
// 	</li>
// </ul>
// </li>';
$subscribe = '
<li id="menu-subscribe" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-16"><a href="#">subscribe</a>
<ul class="sub-menu">
	<li id="subscribe" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-286">
<a href="#"><form action="//endacavanagh.us14.list-manage.com/subscribe/post?u=93f7397d17ed8b137f70b82a1&amp;id=1f841d5bb1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<input type="email" value="" name="EMAIL" class="email topmenu-subscribe-field" id="mce-EMAIL" size="20" placeholder="your email..." required>
    <button type="submit" class="topmenu-subscribe-button"><i class="fa fa-paper-plane-o"></i></button>
   <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_93f7397d17ed8b137f70b82a1_1f841d5bb1" tabindex="-1" value=""></div>
</form></a>
	</li>
</ul>
</li>';

$social = '
<li id="menu-social" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24"><a target="_blank" href="https://www.linkedin.com/company/enda-cavanagh-photography"><i class="fa fa-linkedin-square"></i><span class="text">Enda on LinkedIn</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25 no-border"><a target="_blank" href="http://www.facebook.com/endacavanaghphoto"><i class="fa fa-facebook"></i><span class="text">Enda on Facebook</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26 no-border"><a target="_blank" href="https://twitter.com/endacavanagh"><i class="fa fa-twitter"></i><span class="text">Enda on Twitter</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27 no-border"><a target="_blank" href="https://plus.google.com/u/0/112994619421871033869/posts"><i class="fa fa-google-plus"></i><span class="text">Enda on Google+</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28 no-border"><a target="_blank" href="https://www.instagram.com/cavanaghenda"><i class="fa fa-instagram"></i><span class="text">Enda on Instagram</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29"><a class="icon-link" href="/ENDA/cart"><i class="fa fa-shopping-cart"></i></a></li>
';

				wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'items_wrap' => '<ul id=%1$s class=%2$s>%3$s'.$search.$subscribe.$social.'</ul>' ) );

				/*wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) );*/
			?>
		</nav><!-- #site-navigation -->
		<nav id="mobile-right-menu">
			<?php 
				wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); 
			?>
		</nav><!-- #mobile-right-menu -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
