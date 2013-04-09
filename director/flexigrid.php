<?

    // require common code
    require_once("includes/common.php"); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captain Sign-Up</title>
<link href="script/styles_form.css" rel="stylesheet" type="text/css" />
<link href="script/flexigrid.pack.css" rel="stylesheet" type="text/css" />
<link href="script/flexigrid.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
-->
</style>
</head>
<script type="text/javascript" src="script/jquery-1.4.js"></script>
<script type="text/javascript" src="script/field_highlight.js"></script>
<script type="text/javascript" src="script/flexigrid.js"></script>
<script type="text/javascript" src="script/flexigrid.pack.js"></script>
<script type="text/javascript" src="script/flexigridtest.js"></script>
<body>
<form action="captregister2.php" method="post" name="registration">
  
  <div id="page-wrap">
    <div class="mainContent">
      <div id="header">
        <h1>Captain <br />
          Sign-Up</h1>
      </div>
      <div id="contact">
        <h2> Contact Information</h2>
        <div class="singleField">
          <h3>Name</h3>
          <input  name="firstname" type="text" value="First" />
          <input  name="lastname" type="text" value="Last"/>
        </div>
    

		
        <div class="singleField">
         
            <h3>Email:</h3>
            <input name="Email" type="text" />
          
          
        </div>
        <div class="infoBox 1"> Ex. 555-555-555</div>
                <div class="singleField">
          <h3>Cell Number:</h3>
          <input class="info 1" name="Phone" type="text" />
        </div>
        
        <h2 id="team"> Team Information</h2>
        <div class="singleField">

	<select class="game" name="Game">
          <option value="blank">Select Game</option>
          <option value="Football">Football</option>
          <option value="Foosball">Foosball</option>
		  <option value="Tennis">Tennis</option>
          <option value="Ultimate Frisbee">Ultimate Frisbee</option>
          			
        
		</select>
        
        <select id="right" name="Dorm">
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
        
<div> 
<table id="flex1" style="display:none"></table>       
</div>
<div class="singleField">
          <h3>Password</h3>
          <input name="password1" type="password"/>
		  <h3>Confirm Password</h3> 
          <input name="password2" type="password"/>
        </div>

<input id="submit" type="submit" value="Register" />

</div>
      <!--<div class="infoBoxPhone"></div>-->

	  </div>
  </div>

</form>
</body>
</html>
