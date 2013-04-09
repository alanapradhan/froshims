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
	left: -60px;
	top: 45px;
}
#apDiv3 {
	position:absolute;
	width:521px;
	height:131px;
	z-index:1;
	left: 68px;
	top: -74px;
}
#apDiv4 {
	position:absolute;
	width:381px;
	height:29px;
	z-index:3;
	left: 374px;
	top: 112px;
}
-->

</style>   
</head>
<body>


<div id="apDiv2"><img src="images/sheild.png" width="666" height="742" />    
  <div align="center">
</div>

  

<div id="apDiv1"> 
<table cellpadding="0" cellspacing="0" style="width:800px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
align="center" >

        

<?






$GameType= "Pingpong";
$result = mysql_query("SELECT * FROM schedule Where Game= '$GameType'");   

                    //print('<td> Game </td>');

                    print('<td> Date </td>');

                    print('<td> Time </td>');

                    print('<td> Team 1 </td>');

                    print('<td> Team 2</td>');

                    print('<td> Location </td>');







                  while ($row = mysql_fetch_array($result))

                  {

print('<tr>');

                    //print('<td>' . $row["Game"] .  '</td>');

print('<td>' . $row["Date"] .  '</td>');

print('<td>' . $row["Time"] .  '</td>');

print('<td>' . $row["Team1"] .  '</td>');

print('<td>' . $row["Team2"] .  '</td>');

print('<td>' . $row["Location"] .  '</td>');

print('</tr>'); 



                  }

?>  

</table>
  </div>
        

        


</div>
  </div>

  <div id="apDiv4">Full Schedule: <a href="schedfootball.php">Flag Football</a> | Ping Pong | <a href="index.php">Home</a></div>
</body>

</html>
