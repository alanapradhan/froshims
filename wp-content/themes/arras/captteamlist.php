<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                <body>

<?                                         
$uid = $_SESSION['uid'];

//Show teams
$find= mysql_query("SELECT sport,email from beta_captRegister WHERE Cid='$uid'");
if(mysql_num_rows($find) != 0){
print('<div  style="overflow:auto">');
			print('<table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center">'); 



$row1 = mysql_fetch_array($find);

$GameType=$row1["sport"];
$email = $row1["email"];
echo "<h2>Captian List For : $GameType</h2>";

$result = mysql_query("SELECT * FROM beta_captRegister, beta_teamList  WHERE beta_captRegister.sport= '$GameType' and beta_captRegister.Tid = beta_teamList.Tid ORDER BY beta_captRegister.Tid ");

           
print('<td> Dorm </td>');     

print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>');

                  while ($row = mysql_fetch_array($result))

                  {

//echo "the firstname is: $name"; 
print('<tr>');
print('<td>' . $row["dorm"] .  '</td>');

print('<td>' . $row["captFname"] .  '</td>');
print('<td>' . $row["captLname"] .  '</td>');
print('<td>' . $row["email"] .  '</td>');
print('<td>' . $row["phone"] .  '</td>');

                  }

print('</table></div>');

}

//If a captain and Individual get individual players list
$indivSport = Foosball;
$isIndiv = mysql_query("SELECT * FROM beta_individual Where email= '$email' AND sport='$sport'");
    

    // if we found a row, get the individual games
    if (mysql_num_rows($isIndiv) != 0)
    {
$row5 = mysql_fetch_array($isIndiv);
$gameType = $row5["sport"]; 	
echo "<h2>Captian List For : $gameType</h2>";
//Get Individuals Team(s)
print('<div  style="overflow:auto">');
			print('<table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center">'); 
$sqlIndiv = mysql_query("SELECT * FROM beta_individual ORDER BY lname");
print('<td> Dorm </td>');     

print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>');
//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
print('<tr>');
print('<td>' . $rowIndiv["dorm"] .  '</td>');

print('<td>' . $rowIndiv["fname"] .  '</td>');
print('<td>' . $rowIndiv["lname"] .  '</td>');
print('<td>' . $rowIndiv["email"] .  '</td>');
print('<td>' . $rowIndiv["phone"] .  '</td>');
}



print('</table></div>');

}
//captain list for individual sports
if(isset($_SESSION["Iid"])){
	$uid = $_SESSION['Iid'];

//Get Individuals Team(s)
print('<div  style="overflow:auto">');
			print('<table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center">'); 
$sqlIndiv = mysql_query("SELECT * FROM beta_individual ORDER BY lname");
print('<td> Dorm </td>');     

print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>');
//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
print('<tr>');
print('<td>' . $rowIndiv["dorm"] .  '</td>');

print('<td>' . $rowIndiv["fname"] .  '</td>');
print('<td>' . $rowIndiv["lname"] .  '</td>');
print('<td>' . $rowIndiv["email"] .  '</td>');
print('<td>' . $rowIndiv["phone"] .  '</td>');
}



print('</table></div>');
}


?>


                                                          
                                                       </body>
                                                     </html>
                                                                    
