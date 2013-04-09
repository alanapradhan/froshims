<?php
/*
 * Template Name: Dodgeball
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
						<h1 align="center">Dodgeball Schedule</h1>
					</div>
<iframe src="https://www.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=4j5p2f76m7ovmll1dlgtvhvsgo%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=America%2FNew_York" style=" border-width:0 " width="600" height="600" frameborder="0" scrolling="no"></iframe>
					<br />
					<?php
						include ('table_dball.php');
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