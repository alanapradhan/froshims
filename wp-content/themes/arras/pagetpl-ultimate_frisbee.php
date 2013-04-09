<?php
/*
 * Template Name: Ultimate Frisbee
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
					<div class="home-title">
						<h1 align="center">Ultimate Frisbee Schedule</h1>
					</div>
					<iframe src="https://www.google.com/calendar/embed?mode=AGENDA&amp;src=vhis0e7cgesmdfuj2jeh10aee4%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="600" height="600" frameborder="0" scrolling="no"></iframe>
					<br />
					<?php
						include ('table_ultimate_frisbee.php');
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