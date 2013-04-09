<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>





<?                                         
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >;');
// escape username and password for safety
   $GameType = mysql_real_escape_string($_REQUEST['game']);
    //$numshare = mysql_real_escape_string($_POST["numshare"]);
/*
if (isset($_GET['delete']))
                {
                    $delete = mysql_real_escape_string($_GET['delete']);

                    // Select the info of the friend user wants to add
                    $result = mysql_query("DELETE FROM schedule WHERE gid = 
$delete");
                    //$row = mysql_fetch_array($result);
echo "<tr>Game has been deleted!</tr>";
//redirect(seesched.php);
}
*/

$uid = $_SESSION['uid'];
        

$blank="";

$sql = mysql_query("SELECT TeamName FROM captain Where uid= '$uid'");
$row = mysql_fetch_array($sql);

$teamName= addslashes($row["TeamName"]);

echo "The Team is: $teamName";
$result = mysql_query("SELECT * FROM schedule Where Team1= '$teamName' or Team2= '$teamName' ");

           
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 
print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>');                
while ($row = mysql_fetch_array($result))

                  {
$gid=$row['gid'];
//echo "the firstname is: $name"; 
print('<tr>');

                    print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
print('<td>' . $row["Team1"] .  '</td>');
print('<td>' . $row["Team2"] .  '</td>');
print('<td>' . $row["Location"] .  '</td>');
print('<td>' . $row["Win"] .  '</td>');
print('<td>' . $row["Loss"] .  '</td>');
print('<td>' . $row["Forfeit"] .  '</td>');

print('<td><a href="captreportscore.php?report=' . $gid .
'& game=' . $row["Game"] . '">Report Score</a></div></td>');
print('</tr>');
                  }

print('</table>');
?>


