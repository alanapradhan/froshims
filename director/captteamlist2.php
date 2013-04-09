<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
<table cellpadding="0" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >
<?                                         
$uid = $_SESSION['uid'];
$find= mysql_query("SELECT Game from captain where uid='$uid'");
$row1 = mysql_fetch_array($find);
$GameType=$row1["Game"];
$result = mysql_query("SELECT * FROM signup_vw Where Game= '$GameType'");

           
print('<td> Dorm </td>');     
print('<td> Team Name </td>');
print('<td> First Name </td>');
print('<td> Last Name </td>');
print('<td> Email</td>');     
print('<td> Phone </td>'); 
                  while ($row = mysql_fetch_array($result))

                  {
$name=$row['Fname'];
//echo "the firstname is: $name"; 
print('<tr>');
print('<td>' . $row["Dorm"] .  '</td>');
print('<td>' . $row["TeamName"] .  '</td>');
                    print('<td>' . $row["Fname"] .  '</td>');
print('<td>' . $row["Lname"] .  '</td>');
print('<td>' . $row["Email"] .  '</td>');
print('<td>' . $row["Phone"] .  '</td>');
print('</tr>');
                  }

?>

</table>
 <div align="center" style="margin: 10px;">
<table border= "2">

<td><a href="captain.php">Captain Home</a></td>

</table>
    </div>                                                             
                                                       </body>
                                                     </html>
                                                                    
