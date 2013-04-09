<?

    // require common code
    require_once("includes/commonRequired.php"); 


                                        
// escape username and password for safety
       

$uid = $_SESSION['uid'];
        

$blank="";
$rowcount=1;

//Get Captain's email
$sqlEmail = mysql_query("SELECT email FROM beta_captRegister Where Cid= '$uid'");
$rowEmail = mysql_fetch_array($sqlEmail);
$email= $rowEmail["email"];

//Get Captain's Team(s)
$sqlTeam = mysql_query("SELECT Tid FROM beta_captRegister Where email= '$email'");

//Create tables for teams
while ($rowTeam = mysql_fetch_array($sqlTeam)){
  	
//Find Team Info  
$Tid= $rowTeam["Tid"];
$findTeamName = mysql_query("SELECT * FROM beta_teamList where Tid= '$Tid'");
$rowTeamName = mysql_fetch_array($findTeamName);
$teamName= $rowTeamName ["dorm"]." ". $rowTeamName ["name"]." ". $rowTeamName ["sport"]." ".$rowTeamName ["instance"];


//Create Table
echo (" Team: <strong>".$teamName."</strong> - Please check all the boxes that apply.");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Tid' and score=0 and type=0 or Team2= '$Tid' and score=0 and type=0");
   
//Make Headings
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
print('<td> Team2</td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
//print('<td> Location </td>'); 
print('<td> Double Forfeit </td>');
print('<td> Tie </td>');

while ($row = mysql_fetch_array($result)) {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');
$gamenum= "game".$rowcount;
$winner = "winner".$rowcount;
$loser = "loser".$rowcount;
$forfeit = "forfeit".$rowcount;
$doubleForfeit = "doubleForfeit".$rowcount;
$tie = "tie".$rowcount;
print('<input type="hidden" value="' . $row["GId"] . '" name="' . $gamenum . '">');                     
print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

//print('<td>' . $row["Team1"] .  '</td>');
//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["dorm"] ." ". $team1Row["name"] ."-". $team1Row["instance"] .  '</td>');



print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team1"] . 
'"]"></td>');

//print('<td>' . $row["Team2"] .  '</td>');
//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["dorm"] ." ". $team2Row["name"] ."-". $team2Row["instance"] .  '</td>');

print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team2"] . 
'"]"></td>');

//print('<td>' . $row["Location"] .  '</td>');
print('<td><input type="checkbox" name="' . $doubleForfeit . '" value="' . $row["GId"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $tie . '" value="1"]"></td>');
print('</tr>');
$rowcount++;                  

}
print('</table>');
print('<br />');
}

//If a captain and Individual get individual games
$sqlIndiv = mysql_query("SELECT * FROM beta_individual Where email= '$email'");
    

    // if we found a row, get the individual games
    if (mysql_num_rows($sqlIndiv) != 0)
    {
    	//Get Captain's Team(s)
$sqlIndiv = mysql_query("SELECT * FROM beta_individual Where email= '$email'");

//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
//Find Team Info  
$sport = $rowIndiv["sport"];
$Iid= $rowIndiv["Iid"];
$teamName= $rowIndiv["fname"]." ". $rowIndiv ["lname"];


//Create Table
echo ($sport. " Player: <strong>".$teamName."</strong> - Please check all the boxes that apply.");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Iid' and score=0 and type=1 or Team2= '$Iid' and score=0 and type=1");
   
//Make Headings
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
print('<td> Team2</td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
//print('<td> Location </td>'); 
print('<td> Double Forfeit </td>');

while ($row = mysql_fetch_array($result)) {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');
$gamenum= "game".$rowcount;
$winner = "winner".$rowcount;
$loser = "loser".$rowcount;
$forfeit = "forfeit".$rowcount;
$doubleForfeit = "doubleForfeit".$rowcount;
print('<input type="hidden" value="' . $row["GId"] . '" name="' . $gamenum . '">');                     
print('<td>' . $row["GId"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

//print('<td>' . $row["Team1"] .  '</td>');
//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] .'</td>');



print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team1"] . 
'"]"></td>');

//print('<td>' . $row["Team2"] .  '</td>');
//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["fname"] ." ". $team2Row["lname"] .'</td>');

print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team2"] . 
'"]"></td>');

//print('<td>' . $row["Location"] .  '</td>');
print('<td><input type="checkbox" name="' . $doubleForfeit . '" value="' . $row["GId"] . 
'"]"></td>');
print('</tr>');
$rowcount++;                  

}
print('</table>');
print('<br />');
}		
	}
/*
 * 
 * 
 * 
 * ONLY INDIVIDUAL PLAYER
 * 
 * 
 * 
 * 
 */ 
	
if(isset($_SESSION["Iid"])){
	$uid = $_SESSION['Iid'];

    	//Get Captain's Team(s)
$sqlIndiv = mysql_query("SELECT * FROM beta_individual Where Iid= '$uid'");

//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
//Find Team Info  
$sport = $rowIndiv["sport"];
$Iid= $rowIndiv["Iid"];
$teamName= $rowIndiv["fname"]." ". $rowIndiv ["lname"];


//Create Table
echo ($sport. " Player: $teamName - Please check all the boxes that apply.");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Iid' and score=0 and type=1 or Team2= '$Iid' and score=0 and type=1");
   
//Make Headings
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
print('<td> Team2</td>');     
print('<td> Win </td>');
print('<td> Loss </td>');
print('<td> Forfeit </td>');
//print('<td> Location </td>'); 
print('<td> Double Forfeit </td>');

while ($row = mysql_fetch_array($result)) {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');
$gamenum= "game".$rowcount;
$winner = "winner".$rowcount;
$loser = "loser".$rowcount;
$forfeit = "forfeit".$rowcount;
$doubleForfeit = "doubleForfeit".$rowcount;
print('<input type="hidden" value="' . $row["GId"] . '" name="' . $gamenum . '">');                     
print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

//print('<td>' . $row["Team1"] .  '</td>');
//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] .'</td>');



print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team1"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team1"] . 
'"]"></td>');

//print('<td>' . $row["Team2"] .  '</td>');
//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["fname"] ." ". $team2Row["lname"] .'</td>');

print('<td><input type="checkbox" name="' . $winner . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $loser . '" value="' . $row["Team2"] . 
'"]"></td>');
print('<td><input type="checkbox" name="' . $forfeit . '" value="' . $row["Team2"] . 
'"]"></td>');

//print('<td>' . $row["Location"] .  '</td>');
print('<td><input type="checkbox" name="' . $doubleForfeit . '" value="' . $row["GId"] . 
'"]"></td>');
print('</tr>');
$rowcount++;                  

}
print('</table>');
print('<br />');
}		

}

$rowcount=$rowcount-1;
print('<input type="hidden" value="' . $rowcount . '" name="rowcount">');  

?>






