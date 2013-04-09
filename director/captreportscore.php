<?

    // require common code
    require_once("includes/commonRequired.php"); 


                                        
// escape username and password for safety
        
$uid = $_SESSION['uid'];
        

$blank="";

$sql = mysql_query("SELECT Tid FROM beta_captRegister Where Cid= '$uid'");
$row1 = mysql_fetch_array($sql);  
$Tid= $row1["Tid"];

$findTeamName = mysql_query("SELECT dorm, name, instance FROM beta_teamList where Tid= '$Tid'");
$row = mysql_fetch_array($findTeamName);
$teamName= $row["dorm"]." ". $row["name"]." ".$row["instance"];

echo ("The team is:". $teamName);
echo (" Please check all the boxes that apply.");
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Tid' or Team2= '$Tid' and score=0");
  
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Winner </td>');
print('<td> Forfeited </td>');
print('<td> Team2</td>');     
print('<td> Winner </td>');
print('<td> Forfeited </td>');
print('<td> Location </td>'); 
$rowcount=1;

while ($row = mysql_fetch_array($result))

                  {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');
$gamenum= "game".$rowcount;
$winner = "winner".$rowcount;
$forfeit = "forfeit".$rowcount;
print('<input type="hidden" value="' . $row["GId"] . '" name="' . $gamenum . '">');                     
print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
print('<td>' . $row["Team1"] .  '</td>');
print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td>' . $row["Team2"] .  '</td>');
print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $doubleForfeit . '" value="' . $row["GId"] . 
'"]"></td>');
print('<td>' . $row["Location"] .  '</td>');
print('</tr>');
$rowcount++;                  
}
print('<input type="hidden" value="' . $rowcount . '" name="rowcount">');  
?>

</table>
 <div align="center" style="margin: 10px;">
<table border= "2">
 <input type="submit" value="reportscore" />

<td><a href="captain.php"> Captain Home</a></td>


</table>
    </div>                              
</form>                               
                                                       </body>
                                                     </html>
                                                                    
