<?

    // require common code
    require_once("includes/commonRequired.php"); 
    
    // escape username and both passwords for safety
$g = mysql_real_escape_string($_POST["g"]);

if($g =="Table Tennis" || $g=="Squash" || $g=="Foosball"){
$type="1";
}
else{
$type="0";
}

for($i=1; $i < 26 ;$i++)
{ 
//$t = mysql_real_escape_string($_POST["t".$i]);
$m = mysql_real_escape_string($_POST["m".$i]);
    $d = mysql_real_escape_string($_POST["d".$i]);
$team1= mysql_real_escape_string($_POST["team1".$i]);
$team2= mysql_real_escape_string($_POST["team2".$i]);
    $l = mysql_real_escape_string($_POST["l".$i]);
    $t= mysql_real_escape_string($_POST["t".$i]); 
$date= date("Y")."-".$m."-".$d;
if($l!="")
{
         
         $result = mysql_query("INSERT INTO beta_schedule (type,GameType,Date, 
Time,Team1,Team2,Location)
         
VALUES('$type','$g','$date','$t','$team1','$team2','$l')");

}
else
{
break;
}
}         

//List of successful game entries
$success= mysql_query("SELECT * FROM beta_schedule WHERE GameType = '$g' ORDER BY GId 
DESC");

print('<div> Are These Correct? <br />If so, click here to 
<a href="emaillist.php?game='.$g.'">send
emails</a>. <br />If
not, click here to <a href="seesched2.php?game='.$g.'"> edit the schedule</a>. <br
/> 
Otherwise
return to the 
<a href="director.php"> Director Homepage</a></div>');

print('<table cellpadding="0" cellspacing="0" style="width:590px;" 
bgcolor="#FFFFFF" border="2" align="center" >');

print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');
print('<td> Team2</td>');
print('<td> Location </td>');
echo $i;
for($j=1; $j<$i; $j++)
{  

$row = mysql_fetch_array($success);

                  
$gid=$row['GId'];
$type=$row['type'];
print('<tr>');

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
//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["dorm"] ." ". $team1Row["name"] ."-". $team1Row["instance"] .  '</td>');

//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["dorm"] ." ". $team2Row["name"] ."-". $team2Row["instance"] .  '</td>');
}
print('<td>' . $row["Location"] .  '</td>');
print('</tr>');
                  }
print('</table>');



                  
?>
