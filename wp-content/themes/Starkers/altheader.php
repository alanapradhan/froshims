<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script('carousel', get_bloginfo('stylesheet_directory') . '/css/jquery.jcarousel.pack.js', array('jquery'), '20100510' ); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">
$("a").click(function() {
                $("#alana").show();
        });
		
});
</script>
<script type="text/javascript">
jQuery(document).ready(function () {
		
		//jCarousel Plugin
	    jQuery('#carousel').jcarousel({
			vertical: true,
			scroll: 1,
			auto: 2,
			wrap: 'last',
			initCallback: mycarousel_initCallback
	   	});

	//Front page Carousel - Initial Setup
   	jQuery('div#slideshow-carousel a img').css({'opacity': '0.5'});
   	jQuery('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
   	jQuery('div#slideshow-carousel li a:first').append('<span class="arrow"></span>');

  
  	//Combine jCarousel with Image Display
    jQuery('div#slideshow-carousel li a').hover(
       	function () {
        		
       		if (!jQuery(this).has('span').length) {
        		jQuery('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
   	    		jQuery(this).stop(true, true).children('img').css({'opacity': '1.0'});
       		}		
       	},
       	function () {
        		
       		jQuery('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
       		jQuery('div#slideshow-carousel li a').each(function () {

       			if (jQuery(this).has('span').length) jQuery(this).children('img').css({'opacity': '1.0'});

       		});
        		
       	}
	).click(function () {

	      	jQuery('span.arrow').remove();        
		jQuery(this).append('<span class="arrow"></span>');
       	jQuery('div#slideshow-main li').removeClass('active');        
       	jQuery('div#slideshow-main li.' + jQuery(this).attr('rel')).addClass('active');	
        	
       	return false;
	});


});


//Carousel Tweaking

function mycarousel_initCallback(carousel) {
	
	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
}
	
</script>


</head>

<body <?php body_class(); ?>>
<div id="header">
<h1 id="logo"></h1>
 
</div>
	<div id="page-wrap">
	<a href="#">click me</a>
<div id="alana"></div>

<div id="slideshow-main">
			<ul>
				<li class="p1 active">
					<a href="#">
					<img src="<?php bloginfo('template_directory'); ?>/images/Services1.jpg" width="630" height="290" alt=""/>
						
						
					</a>
				</li>
				<li class="p2">
					<a href="#">
						<img src="<?php bloginfo('template_directory'); ?>/images/2_big.gif" width="430" height="290" alt=""/>
						<span class="opacity"></span>
					<span class="content"><h1>Title 2</h1><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p></span>
				  </a>
			  </li>
				<li class="p3">
					<a href="#">
						<img src="<?php bloginfo('template_directory'); ?>/images/3_big.gif" width="430" height="290" alt=""/>
						<span class="opacity"></span>
					<span class="content"><h1>Title 3</h1><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p></span>
				  </a>
			  </li>
				<li class="p4">
					<a href="#">
						<img src="<?php bloginfo('template_directory'); ?>/images/4_big.gif" width="430" height="290" alt=""/>
						<span class="opacity"></span>
					<span class="content"><h1>Title 4</h1><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p></span>
				  </a>
			  </li>
				
	</ul>										
  </div>
<div id="slideshow-carousel">
  <ul id="carousel" class="jcarousel jcarousel-skin-tango">
    <li><a href="#" rel="p1"><img src="<?php bloginfo('template_directory'); ?>/images/Services1.jpg" width="206" height="72" alt="#"/></a></li>
    <li><a href="#" rel="p2"><img src="<?php bloginfo('template_directory'); ?>/images/2.gif" width="206" height="72" alt="#"/></a></li>
    <li><a href="#" rel="p3"><img src="<?php bloginfo('template_directory'); ?>/images/3.gif" width="206" height="72" alt="#"/></a></li>
    <li><a href="#" rel="p4"><img src="<?php bloginfo('template_directory'); ?>/images/4.gif" width="206" height="72" alt="#"/></a></li>
  </ul>
</div>
	
	<hr></hr>
	
	
	
	