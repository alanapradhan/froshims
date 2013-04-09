<?php
/*
 * Template Name: Foosball
 */

// require common code

?>
<?php get_header();?>

<div id="content" class="section">
	<?php arras_above_content()
	?>

	<?php if (have_posts()) : while (have_posts()) : the_post();
	?>
	<?php arras_above_post()
	?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
		<?php arras_postheader()
		?>

		<div class="entry-content clearfix">
			
				<!-- Add Content -->
				<div class="captPortal-schedule">
					
					<?php
						include ('table_foosball.php');
					?>
				</div>
				
		<?php arras_postfooter()
		?>
	</div>
	<?php arras_below_post()
	?>

	<?php endwhile; else:?>

	<?php arras_post_notfound()
	?>

	<?php endif;?>

	<?php arras_below_content()
	?>
</div><!-- #content -->

<?php get_footer();?>