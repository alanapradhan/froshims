<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
<form action="emaillist2.php" method="post" name="emaillist">
<table cellpadding="0" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" 
border="2" bordercolor="#782911"
align="center" >
<?
$GameType = mysql_real_escape_string($_REQUEST['game']);
$blank="";
echo "the game is: $GameType";
$result = mysql_query("SELECT * FROM beta_schedule Where GameType= '$GameType' and
EmailSent=0");
print('<td> Send Email? </td>');
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');


print('<td> Team2</td>');

print('<td> Location </td>');

$emailcount=0;
$i=1;

while ($row = mysql_fetch_array($result))

                  {

$gid=$row['GId'];
$type=$row['type'];
print('<tr>');
$gamenum= "game".$i;
print('<td><input type="checkbox" name="' . $gamenum . '" value="' . $row["GId"] . '" checked></td>');

print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

if($type==1){
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] ."-". $team1Row["dorm"] .  '</td>');

//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["fname"] ." ". $team2Row["lname"] ."-". $team2Row["dorm"] .  '</td>');	
}
else{ 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["dorm"] ." ". $team1Row["name"] ."-". $team1Row["instance"] .  '</td>');
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["dorm"] ." ". $team2Row["name"] ."-". $team2Row["instance"] .  '</td>');
}
print('<td>' . $row["Location"] .  '</td>');
print('</tr>');
$emailcount++;
$i++;
}
print('<input type="hidden" value="' . $emailcount . '" name="emailcount">');


?>

</table>
<div align="center" style="margin: 10px;">
<table border= "2">
 <input type="submit" value="Send Emails" />

<td><a href="director.php">Home</a></td>
<td><a href="editsched.php">Edit Schedule</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Teams</a></td>

</table>
    </div>                              
</form>                               
                                                       </body>
                                                     </html>
