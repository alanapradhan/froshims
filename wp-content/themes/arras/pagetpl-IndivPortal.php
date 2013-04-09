<?php
/*
 * Template Name: IndivPortal
 */

    // require common code
   require_once("includes/commonRequired.php"); 


?>
<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
        
        <div class="entry-content clearfix">
		<form action="<?php bloginfo('template_url'); ?>/indivreportscore2.php" method="post" name="score">
		<!-- Add Content -->
		
		<div class="captPortal-schedule"> 
<div class="home-title">
	<h1 align="center">Team Schedule</h1>
</div>

<?php include('indivseesched.php'); ?>
</div>
		<div class="captPortal-score"> 
<div class="home-title">
	<h1 align="center">Report Scores</h1>
</div>

<?php include('indivreportscore.php'); ?>
 <input id="submit" type="submit" value="reportscore" />
</div>
		
<br />
	<br />

		</div>
        
		<?php arras_postfooter() ?>

  

    </div>
    
	<?php arras_below_post() ?>

    
    
<?php endwhile; else: ?>

<?php arras_post_notfound() ?>

<?php endif; ?>

<?php arras_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>