<?php
/*
 * Template Name: captPortal
 */

// require common code
require_once ("includes/commonRequired.php");
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
		<br />
				<a href="<?php bloginfo('template_url');?>/logout.php">Logout</a>

		<div class="entry-content clearfix">
			<form action="<?php bloginfo('template_url');?>/captreportscore2.php" method="post" name="score">
				
				<!-- Add Content -->
				<div class="captPortal-schedule">
					<div class="home-title">
						<h1 align="center">Team Schedule</h1>
					</div>
					<?php
						include ('captseesched.php');
					?>
				</div>
				<div class="captPortal-score">
					<div class="home-title">
						<h1 align="center">Report Scores</h1>
						<h2> **Note: <u>Volleyball Tournament</u> games should not and can not be reported. We will rely on referees for points.</h2>
					</div>
					<p>
						Please only report the score of a game if you were the captain of the winning team. (Unless there was a double forfeit.)
						<br />
						<ul>
							<li>
								Win/Loss: check off "win" to the right of your team and "loss" to the right of your opponent.
							</li>
							<li>
								Win/Forfeit: check off "win" to the right of your team and "forfeit" to the right of your opponent.
							</li>
							<li>
								Double Forfeit: <strong>ONLY</strong> check doubleforfeit.
							</li>
							<li>
								Tie: <strong>ONLY</strong> check tie.
							</li>
						</ul>
					</p>
					<?php
						include ('captreportscore.php');
					?>
					<input id="submit" type="submit" value="Report Scores" />
				</div>
				<div class="captPortal">
					<div class="home-title">
						<h1 align="center">Captain List</h1>
					
					</div>
							<?php
						include ('captteamlist.php');
					?>
				</div>
				<br />
				<br />
				<a href="<?php bloginfo('template_url');?>/logout.php">Logout</a>
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