<?php
/*
 * Template Name: Captain Login
 */

    // require common code
       // require common code
    require_once("includes/common.php");

    // log out current user (if any)
    session_start();
    session_destroy();
   




?>

<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
        
        <div class="entry-content clearfix">
		<div align="center">
      
      <form action="<?php bloginfo('template_url'); ?>/captlogin2.php">
        <table border="0">
          <tr>
            <td class="field">Email:</td>
            <td><input name="email" type="text" /></td>
          </tr>
          <tr>
            <td class="field">Password:</td>
            <td><input name="password" type="password" /></td>
          </tr>
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Log In" />
        </div>
      
     
      </form>
    </div>
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