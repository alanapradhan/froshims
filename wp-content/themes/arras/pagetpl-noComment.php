<?php
/*
 * Template Name: No Comment
 */



?>

<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
        
        <div class="entry-content clearfix">
		<?php the_content( __('<p>Read the rest of this entry &raquo;</p>', 'arras') ); ?>  
        <?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ', 'arras'), 
			'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
        
		<?php arras_postfooter() ?>

       
    </div>
    

    
<?php endwhile; else: ?>

<?php arras_post_notfound() ?>

<?php endif; ?>


<?php arras_below_content() ?>
</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>