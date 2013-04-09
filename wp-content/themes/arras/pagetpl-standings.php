<?php
/*
 * Template Name: Standings
 */

    // require common code
   require_once("includes/common.php"); 


?>
<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
        
        <div class="entry-content clearfix">
		<form action="<?php bloginfo('template_url'); ?>/captreportscore2.php" method="post" name="score">
		<!-- Add Content -->
		
		<div class="captPortal-schedule"> 
<div class="home-title">
	<h1 align="center">Standings</h1>
</div>
<div align="center"> <script src="https://docs.google.com/spreadsheet/gpub?url=http%3A%2F%2Ftngmqk5kknht7idkbhrks3qtltpmeg9f-ss-opensocial.googleusercontent.com%2Fgadgets%2Fifr%3Fup_title%3DFall%2520Standings%26up_showfilters%3D0%26up_enablegrouping%3D0%26up__table_query_url%3Dhttps%253A%252F%252Fdocs.google.com%252Fspreadsheet%252Ftq%253Frange%253DA1%25253AC17%2526gid%253D0%2526key%253D0Ao793Az9LYC6dGF0MXNzM3ZLdVZzS0U3b3oxMVpsY0E%2526pub%253D1%26url%3Dhttp%253A%252F%252Fwww.google.com%252Fig%252Fmodules%252Ftable.xml%26spreadsheets%3Dspreadsheets&height=360&width=260"></script></div>
<div align="center"><script src="https://docs.google.com/spreadsheet/gpub?url=http%3A%2F%2Ftngmqk5kknht7idkbhrks3qtltpmeg9f-ss-opensocial.googleusercontent.com%2Fgadgets%2Fifr%3Fup_title%3DFall%2520Standings%26up_showfilters%3D1%26up_enablegrouping%3D0%26up__table_query_url%3Dhttps%253A%252F%252Fdocs.google.com%252Fspreadsheet%252Ftq%253Frange%253DA1%25253AG17%2526key%253D0Ao793Az9LYC6dGF0MXNzM3ZLdVZzS0U3b3oxMVpsY0E%2526gid%253D0%2526pub%253D1%26url%3Dhttp%253A%252F%252Fwww.google.com%252Fig%252Fmodules%252Ftable.xml%26spreadsheets%3Dspreadsheets&height=290&width=640"></script></div>
<div align="center"><img src="https://docs.google.com/spreadsheet/oimg?key=0Ao793Az9LYC6dGF0MXNzM3ZLdVZzS0U3b3oxMVpsY0E&oid=10&zx=iorcwyf2hlhd" /></div>
</div>

        
		<?php arras_postfooter() ?>

  

    </div>
    
	<?php arras_below_post() ?>

    
    
<?php endwhile; else: ?>

<?php arras_post_notfound() ?>

<?php endif; ?>

<?php arras_below_content() ?>
</div><!-- #content -->


<?php get_footer(); ?>