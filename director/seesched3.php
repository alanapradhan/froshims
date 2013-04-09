<?

    // require common code
    require_once("includes/common.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
<table cellpadding="0" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >
<?                                         
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

echo "the game is: $GameType";
$result = mysql_query("SELECT * FROM schedule2 WHERE Date BETWEEN DATE_ADD(NOW(), INTERVAL -1 DAY) AND DATE_ADD(NOW(), 
INTERVAL 7 DAY)");

           
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 
print('<td> Week </td>');                  

while ($row = mysql_fetch_array($result))

                  {
$gid=$row['gid'];
//echo "the firstname is: $name"; 
print('<tr>');

                    print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["dorm"] ." ". $team1Row["name"] ."-". $team1Row["instance"] .  '</td>');
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["dorm"] ." ". $team2Row["name"] ."-". $team2Row["instance"] .  '</td>');
print('<td>' . $row["Location"] .  '</td>');
print('<td>' . $row["Week"] .  '</td>');
print('<td><a href="deletesched.php?delete=' . $gid . 
'& game=' . $row["Game"] . '">Delete</a></div></td>');
print('<td><a href="revisesched.php?revise=' . $gid .
'& game=' . $row["Game"] . '">Revise</a></div></td>');
print('<td><a href="reportscore.php?report=' . $gid .
'& game=' . $row["Game"] . '">Report Score</a></div></td>');
print('</tr>');
                  }

?>

</table>
 <div align="center" style="margin: 10px;">
<table border= "2">

<td><a href="director.php">Director Home</a></td>
<td><a href="editsched.php">Schedule Games</a></td>
<td><a href="seesched.php">Back to list of Games</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Team Lists</a></td>

</table>
    </div>                                                             
                                                       </body>
                                                     </html>
                                                                    
