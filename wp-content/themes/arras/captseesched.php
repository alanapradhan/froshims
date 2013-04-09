<?php

    // require common code
    require_once("includes/commonRequired.php"); 







                                        

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
if(isset($_SESSION["uid"])){
$uid = $_SESSION['uid'];
        

$blank="";

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
$row = mysql_fetch_array($findTeamName);
$teamName= $row["dorm"]." ". $row["name"]." ". $row["sport"]." ".$row["instance"];
echo("The team is: <strong>".$teamName."</strong>");
//find list of scheduled games
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Tid' and type=0 or Team2= '$Tid' and type=0");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
           
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 
/*
print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>');                
*/
while ($row = mysql_fetch_array($result))

                  {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');

                    print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

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
print('<td>' . $row["Location"] .  '</td>');

/*print('<td>' . $row["Win"] .  '</td>');
print('<td>' . $row["Loss"] .  '</td>');
print('<td>' . $row["Forfeit"] .  '</td>');

print('<td><a href="captreportscore.php?report=' . $gid .
'& game=' . $row["Game"] . '">Report Score</a></div></td>');
print('</tr>');
*/
                  }

print('</table>');
print('<br />');
}






//If a captain and Individual get individual games
$sqlIndiv = mysql_query("SELECT * FROM beta_individual Where email= '$email'");
    

    // if we found a row, get the individual games
    if (mysql_num_rows($sqlIndiv) != 0)
    {
    	//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
//Find Team Info  
$Iid= $rowIndiv["Iid"];
$sportInd = $rowIndiv["sport"];
$teamName= $rowIndiv["fname"]." ". $rowIndiv["lname"];
print($sportInd." player is: <strong>".$teamName."</strong>");
//find list of scheduled games
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Iid' and type=1 or Team2= '$Iid' and type=1");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
           
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 
/*
print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>');                
*/
while ($row = mysql_fetch_array($result))

                  {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');

                    print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] .'</td>');

//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["fname"] ." ". $team2Row["lname"] .'</td>');
print('<td>' . $row["Location"] .  '</td>');
                  }

print('</table>');
print('<br />');
}
		
    	
	}
}

//If only signed up for Individual

if(isset($_SESSION["Iid"])){
	$uid = $_SESSION['Iid'];

//Get Captain's Team(s)
$sqlIndiv = mysql_query("SELECT * FROM beta_individual Where Iid= '$uid'");

//Create tables for teams
while ($rowIndiv = mysql_fetch_array($sqlIndiv)){
  	
//Find Team Info  
$Iid= $rowIndiv["Iid"];
$sportInd2 = $rowIndiv["sport"];
$teamName= $rowIndiv["fname"]." ". $rowIndiv["lname"];
echo($sportInd2." Player is:".$teamName);
//find list of scheduled games
$result = mysql_query("SELECT * FROM beta_schedule Where Team1= '$Iid' and type=1 or Team2= '$Iid' and type=1");
print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
align="center" >');
           
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 
/*
print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>');                
*/
while ($row = mysql_fetch_array($result))

                  {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');

                    print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');

//Team 1 
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] .'</td>');

//Team 2
$team2=$row["Team2"];
$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
$team2Row= mysql_fetch_array($findTeam2);
print('<td>' . $team2Row["fname"] ." ". $team2Row["lname"] .'</td>');
print('<td>' . $row["Location"] .  '</td>');
                  }

print('</table>');
print('<br />');
}
}
?>


