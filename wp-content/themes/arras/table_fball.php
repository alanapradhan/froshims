
<?php
			print('<div  style="overflow:auto">');
			print('<table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center">');
		

			
			$result = mysql_query("SELECT * FROM beta_schedule Where GameType= 'Flag Football' ORDER BY Date, Time ASC");

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
					print('<td>' . $team1Row["dorm"] . " " . $team1Row["name"] .  '</td>');
					$team2 = $row["Team2"];
					$findTeam2 = mysql_query("SELECT * FROM beta_teamList Where Tid= '$team2'");
					$team2Row = mysql_fetch_array($findTeam2);
					print('<td>' . $team2Row["dorm"] . " " . $team2Row["name"] . '</td>');
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
							if($gameStat != 0) {
								if($i == 7 && $gameStat == 1){
									print('<td>'.$gameStat.'</td>');
								}else{
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
				}
  



                  }



print('</table></div>');

?>

