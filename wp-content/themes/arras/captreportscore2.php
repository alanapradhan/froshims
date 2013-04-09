<?

    // require common code
    require_once("includes/common.php"); 
    
$rowcount = mysql_real_escape_string($_POST["rowcount"]);

for($i=1; $i <= $rowcount ; $i++)
{ 

$gid = mysql_real_escape_string($_POST["game".$i]);
$winner = mysql_real_escape_string($_POST["winner".$i]);
$loser = mysql_real_escape_string($_POST["loser".$i]);
$forfeit = mysql_real_escape_string($_POST["forfeit".$i]);
$doubleForfeit = mysql_real_escape_string($_POST["doubleForfeit".$i]); 
$tie = mysql_real_escape_string($_POST["tie".$i]); 
/*
if($winner != "" && $forfeit != ""){

$error = mysql_query("SELECT * FROM beta_schedule WHERE
GId='$gid'");
$row = mysql_fetch_array($error);
$team1= $row["Team1"];
$team2= $row["Team2"];
$date = $row["Date"];

echo "Reported more than result for the game 
between " .$team1." and " .$team2." on " .$date.". If reporting a forfeit please only check off the team that forfeited. 
The other team will automatically be entered as the winner. ";
break;
}

else{
*/
if($winner != "" && $loser != ""){
   $checkType = mysql_query("SELECT type FROM beta_schedule Where GId= '$gid'");
$typeRow= mysql_fetch_array($checkType);
$type=$typeRow["type"];      	
			
         $updatewin = mysql_query("INSERT INTO beta_reportedScore (GId,type,winner,loser)
         
VALUES('$gid','$type','$winner','$loser')");
$updateScoreReported = mysql_query("UPDATE beta_schedule SET score = 1 WHERE GId='$gid' and type='$type'");
/*
$findloser2 = mysql_query("Select * FROM schedule WHERE
gid='$gid' AND Team1= '$winner'");

	if($row = mysql_fetch_array($findloser2)){
		$loser= addslashes($row["Team2"]);
		$insertloser = mysql_query("UPDATE schedule SET Loss = '$loser' WHERE gid='$gid'");
	}
	
	else{
		$findloser1 = mysql_query("Select * FROM schedule WHERE gid='$gid' AND Team2= '$winner'");
		$row = mysql_fetch_array($findloser1);
		$loser= addslashes($row["Team1"]);
                $insertloser=  mysql_query("UPDATE schedule SET Loss = '$loser' WHERE gid='$gid'"); 
	}

	}
else if($loser != "")
         $updateLoss = mysql_query("INSERT INTO beta_score (GId, loser)
		 VALUES('$gid','$loser')");
		 */
}
else if($winner != "" && $forfeit != ""){
	   $checkType = mysql_query("SELECT type FROM beta_schedule Where GId= '$gid'");
		$typeRow= mysql_fetch_array($checkType);
		$type=$typeRow["type"]; 
	
	
$updateForfeit = mysql_query("INSERT INTO beta_reportedScore (GId, type, winner, forfeit)
         
VALUES('$gid','$type','$winner','$forfeit')");	
$updateScoreReported = mysql_query("UPDATE beta_schedule SET score = 1 WHERE GId='$gid' and type='$type'");
}

else if($doubleForfeit !=""){
	
$checkType = mysql_query("SELECT * FROM beta_schedule Where GId= '$gid'");
$typeRow= mysql_fetch_array($checkType);
$type=$typeRow["type"];
$t1=$typeRow["Team1"]; 
$t2=$typeRow["Team2"];  

$updateDoubleForfeit = mysql_query("INSERT INTO beta_reportedScore (GId, type, forfeit,forfeit2)
         
VALUES('$gid','$type','$t1','$t2')");

$updateScoreReported = mysql_query("UPDATE beta_schedule SET score = 1 WHERE GId='$gid' and type='$type'");

         
}
else if($tie !=""){
	
$checkType = mysql_query("SELECT * FROM beta_schedule Where GId= '$gid'");
$typeRow= mysql_fetch_array($checkType);
$type=$typeRow["type"];
$t1=$typeRow["Team1"]; 
$t2=$typeRow["Team2"];  

$updateDoubleForfeit = mysql_query("INSERT INTO beta_reportedScore (GId, type, tie)
         
VALUES('$gid','$type','$tie')");

$updateScoreReported = mysql_query("UPDATE beta_schedule SET score = 1 WHERE GId='$gid' and type='$type'");

         
}


}
echo("
winner:".$winner."
loser:".$loser."
forfeit:".$forfeit."
doubleForfeit:".$doubleForfeit."
tie: ".$tie."
rowcount:".$rowcount); 
print('<a href="http://www.hcs.harvard.edu/~froshims/captains-portal/">Click Here to return to Captain Home</a>');
         




                  
?>
