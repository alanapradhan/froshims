<?

    // require common code
    require_once("includes/commonRequired.php");


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
	width:500px;
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





$GameType = mysql_real_escape_string($_REQUEST['game']);

$result = mysql_query("SELECT * FROM dorm_netPointsSum_vw");   

                    //print('<td> Game </td>');

                    print('<td> Dorm </td>');

                    print('<td> Wins </td>');

                    print('<td> Losses </td>');

                    print('<td> Forfeit</td>');
					print('<td> Total</td>');
               







                  while ($row = mysql_fetch_array($result))

                  {

print('<tr>');

                    

print('<td>' . $row["Dorm"] .  '</td>');

print('<td>' . $row["wins"] .  '</td>');

print('<td>' . $row["losses"] .  '</td>');

print('<td>' . $row["forfeit"] .  '</td>');

print('<td>' . $row["total"] .  '</td>');


print('</tr>'); 



                  }

?>  

</table>
  </div>
        

        


</div>
  </div>

</body>

</html>
