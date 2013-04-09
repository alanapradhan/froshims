<?php
/*
 * Template Name: registrationValidationMessage
 */

    // require common code
   require_once("includes/common.php"); 


?>
<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>
<div>
	

</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
 <?php
/*
*
* Small program to check if the Player was not signed up at a captain for any of the sports they registered for
*
*/

require_once("includes/common.php"); 
$error1=$_GET['error1'];
$error2=$_GET['error2'];
$error3=$_GET['error3'];
$error4=$_GET['error4'];
$teamSport1=$_GET['teamSport1'];
$teamSport2=$_GET['teamSport2'];
$teamSport3=$_GET['teamSport3'];
$teamSport4=$_GET['teamSport4'];
$individualSport=$_GET['individualSport'];

if ($error1 == "0" && $error2 == "0" && $error3 == "0" && $error4 == "0") {
print("<div class='entry-content clearfix'>");
		the_content( __('<p>Read the rest of this entry &raquo;</p>', 'arras') );
       wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ', 'arras'), 
			'after' => '</p>', 'next_or_number' => 'number')); 
	
		print("</div>");
		

}

else{
	print("<h2 style='color:red;font-size:20px;'> Thank you for registering to be a captain for FroshIMs. Unfortunately the team quota for the following teams is full for your dorm: <br /> <br />");
	if($error1 !="0"){
	print($error1."<br />");
	}
	if($error2 !="0"){
	print($error2."<br />");
	}
	if($error3 !="0"){
	print($error3."<br />");
	}
	if($error4 !="0"){
	print($error4."<br />");
	}
 print("<br />Please be sure to participate as a player for the aforementioned sport(s).");	
	
}


?>
   
        
        
		

  

    </div>
		
		<div class="captPortal-schedule">
			
<?php include('emailCheck.php'); ?>
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