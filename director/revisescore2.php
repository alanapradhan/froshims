<?

    // require common code
    require_once("includes/common.php");
$gid = mysql_real_escape_string($_POST["gid"]);

$w1 = mysql_real_escape_string($_POST["w1"]);

$l1 = mysql_real_escape_string($_POST["l1"]);
$f1 = mysql_real_escape_string($_POST["f1"]);
$result = mysql_query("UPDATE schedule SET Win='$w1',Loss='$l1',Forfeit='$f1' WHERE gid= 
'$gid'");
//List of successful game entries
$success= mysql_query("SELECT * FROM schedule WHERE gid='$gid'");

print('<div>This is the new score report. <br />
Return to the 
<a href="director.php">Director Homepage</a></div>');

print('<table cellpadding="0" cellspacing="0" style="width:590px;" 
bgcolor="#FFFFFF" border="2" align="center" >');

print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');
print('<td> Team2</td>');
print('<td> Location </td>');
print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>');

$row = mysql_fetch_array($success);

                  
$gid=$row['gid'];

print('<tr>');

print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
print('<td>' . $row["Team1"] .  '</td>');
print('<td>' . $row["Team2"] .  '</td>');
print('<td>' . $row["Location"] .  '</td>');
print('<td>' . $row["Win"] .  '</td>');
print('<td>' . $row["Loss"] .  '</td>');
print('<td>' . $row["Forfeit"] .  '</td>');
print('</tr>');

print('</table>');

echo $text . " " . $g1; 
//redirect("director.php");
?>
