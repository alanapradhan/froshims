<?

    // require common code
    require_once("includes/common.php");


?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>

<style type="text/css">

<!--    


fieldset { margin-bottom: 1em; border: 1px solid #888; border-right: 1px solid 
#666; border-bottom: 1px solid #666;}

legend { font-weight: bold; border: 1px solid 
#888; border-right: 1px solid #666; border-bottom: 1px solid #666; padding: . 5em; 
background-color: #666; background-image: url(title-glass.png); background-repeat: 
repeat-x; background-position: 50% 50%; color: #fff; text-shadow: 0 -1px 0 #333; 
letter-spacing: .1em; text-transform: uppercase;}    
#apDiv2 {
	position:absolute;
	width:1021px;
	height:800px;
	z-index:2;
	left: 433px;
	top: 100px;
}
#apDiv1 {
	position:absolute;
	width:400px;
	height:600px;
	z-index:1;
	left: 60px;
	top: 61px;
}
#apDiv3 {
	position:absolute;
	width:521px;
	height:131px;
	z-index:1;
	left: 68px;
	top: -74px;
}
-->

</style>   

    
</head>
  <body>


<div id="apDiv2"><img src="images/sheild.png" width="666" height="742" />    
  <div align="center">
</div>
<div id="apDiv3"><img src="images/fallims.png"/></div>
<div id="apDiv1">    
  <form action="register2.php" method="post" name="registration">

<div id="apDiv1"> 
<fieldset>  
<legend>Team Sign-up</legend>        
        
        <table border="0">
<tr>
<select name="Game">
<option value="blank">Select Game Type</option>
  <option value="Pingpong">Pingpong</option>
  <option value="Frisbee">Ultimate Frisbee</option>
  <option value="Flag Football">Flag Football</option>
  <option value="Soccer">Soccer</option>
</select>
</tr>          
<select name="Dorm">
<option value="blank">Select Dorm</option>
  <option value="Apley Court">Apley Court</option>
  <option value="Canaday">Canaday</option>
  <option value="Grays">Grays</option>
  <option value="Greenough">Greenough</option>
<option value="Hollis">Hollis</option>
<option value="Holworthy">Holworthy</option>
<option value="Hurlbut">Hurlbut</option>
<option value="Lionel">Lionel</option>
<option value="Mass Hall">Mass Hall</option>
<option value="Matthews">Matthews</option>
<option value="Mower">Mower</option>
<option value="Pennypacker">Pennypacker</option>
<option value="Stoughton">Stoughton</option>
<option value="Straus">Straus</option>
<option value="Thayer">Thayer</option>
<option value="Weld">Weld</option>
<option value="Wigglesworth">Wigglesworth</option>
</select>
<tr>
</fieldset>
 <fieldset>  
<legend>Contact Information</legend>
<tr>
            <td>Firstname:</td>
            <td><input name="firstname" type="text" /></td>
          </tr>
          <tr>
            <td>Lastname:</td>
            <td><input name="lastname" type="text" /></td>
          </tr>
                                            
        <!--  <tr>
          <input type="hidden" value="<?php echo $_GET[id]; ?>" name="lat">  
          <input type="hidden" value="<?php echo $_GET[id2]; ?>" name="lng">
          <input type="hidden" value="<?php echo $_GET[id2]; ?>" name="address">
          </tr>
          -->
          <tr>
 <td class="field">Email:</td>
            <td><input name="Email" type="text" /></td>
          </tr>
          
          <tr>
            <td class="field">Phone Number:</td>
<td><input name="Phone" type="text" /></td>
<tr>
<td>
i.e. 555-555-5555
</td>
</tr>            
        </table>
        
<div style="margin: 10px;">
          <input type="submit" value="Register" />

        </div>
        
</fieldset>
      </form>
    </div>
  </div>

</body>

</html>
