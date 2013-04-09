<?php
/*
 * Template Name: indivRegister
 */

    // require common code
    require_once("includes/common.php"); 


?>
<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php arras_above_post() ?>
	<div id="post-<?php the_ID() ?>" <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>


	
        
        <div class="entry-content clearfix">
		<form action="<?php bloginfo('template_url'); ?>/captregister2.php" method="post" name="registration">
  
 
        <h1>Individual Sport 
          Sign-Up</h1>
      </div>
      <div id="contact">
        <h2> Contact Information</h2>
        <div class="singleField">
          <h4>Name</h4>
          <input  name="firstname" type="text" value="First" />
          <input  name="lastname" type="text" value="Last"/>
        </div>
    

		
        <div class="singleField">
         
            <h4>Email:</h4>
            <input name="Email" type="text" />
          
          
        </div>
        
        <div class="singleField">
          <h4>Password</h4>
          <input name="password1" type="password"/>
		  <h4>Confirm Password</h4> 
          <input name="password2" type="password"/>
        </div>
        <div class="infoBox 1"> Ex. 555-555-555</div>
                <div class="singleField">
          <h4>Cell Number:</h4>
          <input class="info 1" name="Phone" type="text" />
        </div>
        
        <h2 id="team"> Sport Information</h2>
        <div class="singleField">

	
         <h4>Select the individual sport you would like to play:</h4>
          <!--<input type="checkbox" name="individualSport" value="Table Tennis">Table Tennis</input>-->
		  <input type="checkbox" name="individualSport" value="Squash">Squash</input>
        </div>
        
         <div class="singleField">
        <select name="Dorm">
          <option value="blank">Select Dorm</option>
          <option value="ApleyCourtMassHall">Apley Court/Mass Hall</option>
          <option value="Canaday">Canaday</option>
          <option value="Grays">Grays</option>
          <option value="Greenough">Greenough</option>
          <option value="Hollis">Hollis</option>
          <option value="Holworthy">Holworthy</option>
          <option value="Hurlbut">Hurlbut</option>
          <option value="Lionel">Lionel</option>
          <option value="Matthews">Matthews</option>
          <option value="Mower">Mower</option>
          <option value="Pennypacker">Pennypacker</option>
          <option value="Stoughton">Stoughton</option>
          <option value="Straus">Straus</option>
          <option value="Thayer">Thayer</option>
          <option value="Weld">Weld</option>
          <option value="Wigglesworth">Wigglesworth</option>
        </select>
        
        </div>
        
         <div class="singleField">
        
        <select name="entryway">
          <option value="blank">Select Entryway/Floor</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="North">North</option>
          <option value="South">South</option>
		  <option value="East">East</option>
          <option value="West">West</option>
          <option value="Middle">Middle</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="G">G</option>
          <option value="H">H</option>
          <option value="I">I</option>
          <option value="J">J</option>
          <option value="K">K</option>
        </select>
        
        </div>
      

<br />
<input id="submit" type="submit" value="Register" />
<br />
<br />

</div>
      <!--<div class="infoBoxPhone"></div>-->
    </div>
  </div>

</form>
		</div>
        
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>

