<?

// require common code
require_once ("includes/commonRequired.php");
?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center" >
			<?php
			$GameType = mysql_real_escape_string($_REQUEST['game']);
		

			echo "the game is: $GameType";
			$result = mysql_query("SELECT * FROM beta_schedule Where GameType= '$GameType' ORDER BY Date ASC");

			print('<td> Gid </td>');
			print('<td> Date </td>');
			print('<td> Time </td>');
			print('<td> Team1 </td>');
			print('<td> Team2</td>');
			print('<td> Location </td>');
			print('<td> Winner </td>');
			print('<td> Loser </td>');
			print('<td> Forfeit </td>');
			print('<td> Forfeit </td>');
			print('<td> Tie </td>');

			while($row = mysql_fetch_array($result)) {
				$gid = $row['GId'];

				//echo "the firstname is: $name";
				print('<tr>');
				print('<td>' . $row["GId"] . '</td>');
				print('<td>' . $row["Date"] . '</td>');
				print('<td>' . $row["Time"] . '</td>');

				// Get individual's name if individual game is being viewed
				$type = $row['type'];
				if($type == 1) {
					$team1 = $row["Team1"];
					$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
					$team1Row = mysql_fetch_array($findTeam1);
					print('<td>' . $team1Row["fname"] . " " . $team1Row["lname"] . "-" . $team1Row["dorm"] . '</td>');

					//Team 2
					$team2 = $row["Team2"];
					$findTeam2 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team2'");
					$team2Row = mysql_fetch_array($findTeam2);
					print('<td>' . $team2Row["fname"] . " " . $team2Row["lname"] . "-" . $team2Row["dorm"] . '</td>');
				}
				//Get team name if team sport is being played
				else {

					$team1 = $row["Team1"];
					$findTeam1 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team1'");
					$team1Row = mysql_fetch_array($findTeam1);
					print('<td>' . $team1Row["dorm"] . " " . $team1Row["name"] . "-" . $team1Row["instance"] . '</td>');
					$team2 = $row["Team2"];
					$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
					$team2Row = mysql_fetch_array($findTeam2);
					print('<td>' . $team2Row["dorm"] . " " . $team2Row["name"] . "-" . $team2Row["instance"] . '</td>');
				}
				print('<td>' . $row["Location"] . '</td>');
				
				// if score has been reported than get the winner and loser
				$scores = mysql_query("SELECT * FROM beta_reportedScore WHERE GID = '$gid'");
				if($scoreRow = mysql_fetch_row($scores)) {
					$i = 0;
					
					foreach($scoreRow as $gameStat) {
						$i++;
						//get Team Sport Results
						
						if($i > 2) {
						if($gameStat==1)print('<td>1</td>');
							else if($gameStat != 0) {
								if($type==1){
									$findInd = mysql_query("SELECT * FROM beta_individual Where Iid= '$gameStat'");
								$indRow = mysql_fetch_array($findInd);
								print('<td>'. $indRow["fname"] . " " . $indRow["lname"] .  "-" . $indRow["dorm"] . '</td>');
								}
								else{
									$findTeam = mysql_query("SELECT * FROM beta_teamList Where Tid= '$gameStat'");
								$teamRow = mysql_fetch_array($findTeam);
								print('<td>' . $teamRow["dorm"] . " " . $teamRow["name"] . "-" . $teamRow["instance"] . '</td>');
								}
								
					
					
						
								

							}else print('<td></td>');
						} 
					}

				} else {
				print('<td></td>');
					print('<td></td>');
					print('<td></td>');
					print('<td></td>');
					print('<td></td>');
				}

				//print scheduling options
				print('<td><a href="deletesched.php?delete=' . $gid . '& game=' . $row["GameType"] . '">Delete</a></div></td>');
				print('<td><a href="revisesched.php?revise=' . $gid . '& game=' . $row["GameType"] . '">Revise</a></div></td>');
				print('<td><a href="reportscore.php?report=' . $gid . '& game=' . $row["GameType"] . '">Report Score</a></div></td>');
				print('<td><a href="revisescore.php?revise=' . $gid . '& game=' . $row["GameType"] . '">Revise Reported Score</a></div></td>');
				print('</tr>');
			}

			print('</table>
 <div align="center" style="margin: 10px;">
<table border= "2">

<td><a href="director.php">Director Home</a></td>
<td><a href="emaillist.php?game=' . $GameType . '"> Send Emails</a></td>
<td><a href="schedlist.php">Schedule Games</a></td>
<td><a href="seesched.php">Back to list of Games</a></td>
<td><a href="reportscore.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Team Lists</a></td>
</table>');
		?>

			</div>
	</body>
</html>
