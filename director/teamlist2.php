<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >
<?                                         
// escape username and password for safety
   $GameType = mysql_real_escape_string($_REQUEST['game']);
    //$numshare = mysql_real_escape_string($_POST["numshare"]);


if($GameType=="Table Tennis" || $GameType=="Squash" || $GameType=="Foosball")
{
	$result = mysql_query("SELECT * FROM beta_individual where sport='$GameType' Order by dorm");

           
print('<td> Dorm </td>');     
print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>');

                  while ($row = mysql_fetch_array($result))

                 {
$uid=$row['Iid'];
//echo "the firstname is: $name"; 
print('<tr>');
print('<td>' . $row["dorm"] .  '</td>');
print('<td>' . $row["fname"] .  '</td>');
print('<td>' . $row["lname"] .  '</td>');
print('<td>' . $row["email"] .  '</td>');
print('<td>' . $row["phone"] .  '</td>');
print('<td><a href="deleteSingle.php?delete=' . $uid . 
'&game=' .$GameType . '">Delete</a></div></td>');
print('</tr>');
                  }


}
else{
echo "<h2>The game is: $GameType</h2>";

$result = mysql_query("SELECT * FROM beta_captRegister, beta_teamList  Where beta_captRegister.sport= '$GameType' and beta_captRegister.Tid=beta_teamList.Tid
Order by beta_captRegister.Cid");

           
print('<td> Dorm </td>');     
print('<td> Team Name </td>');
print('<td> Instance </td>');
print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>');
print('<td> Delete Team </td>');
                  while ($row = mysql_fetch_array($result))

                  {
$uid=$row['Cid'];
//echo "the firstname is: $name"; 
print('<tr>');
print('<td>' . $row["dorm"] .  '</td>');
print('<td>' . $row["name"] .  '</td>');
print('<td>' . $row["instance"] .  '</td>');
print('<td>' . $row["captFname"] .  '</td>');
print('<td>' . $row["captLname"] .  '</td>');
print('<td>' . $row["email"] .  '</td>');
print('<td>' . $row["phone"] .  '</td>');
print('<td><a href="deleteteam.php?delete=' . $uid . 
'& game=' . $row["sport"] . '">Delete</a></div></td>');
print('</tr>');
                  }

}
?>



</table>
 <div align="center" style="margin: 10px;">
<table border= "2">

<td><a href="director.php">Director Home</a></td>
<td><a href="schedlist.php">Schedule Games</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Teams</a></td>

</table>
    </div>                                                             
                                                       </body>
                                                     </html>
                                                                    
