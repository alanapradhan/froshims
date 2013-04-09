
<?php
print('<h2>WELCOME</h2>
<p>The annual Frosh IMs Table Tennis Tournament is set to kick off! Over 100 participants will now engage in 4 intense weeks of fierce competition, culminating in two finalists squaring off in Annenberg for the title of Frosh IMs Class of 2016 Foosball Champion. 

To make the tournament run as smoothly as possible, please read carefully through the <a href="http://www.hcs.harvard.edu/~froshims/rules/#13">rules</a> and follow the instructions below for each round of play. If any questions arise, please contact your Dorm’s <a href="http://www.hcs.harvard.edu/~froshims/yac-reps/">Yard Athletic Council (YAC) Representative</a>. 

We wish you the best of luck, and look forward to seeing you in Annenberg for the 1st Place Match!<br /><br />
 

Best,<br />
The Frosh IMs Team</p>');
print('<h2>INSTRUCTIONS</h2>
<ol>
	<li> Find your match in the schedule below.</li>
	<li> Take note of the date <strong>before which</strong> the match must be played.</li>
	<li> Click on “FIND TABLES” below to find table tennis tables on campus.</li>
	<li> Contact your opponent and decide on a mutually acceptable time and location to play your match.</li>
	<li> After your match has been played, report the match result using the <a href="http://www.hcs.harvard.edu/~froshims/sign-in/">Captain’s Portal</a>.</li>
	<li> Click on “VIEW BRACKET” below to track your and opponents\' progress in the tournament.</li>
	<li> Repeat steps 1-6 for the following round!</li>
</ol>');
print('<h2><a href="http://goo.gl/maps/f20uS">FIND TABLES<a/></h2>');
print('<h2><a href="https://docs.google.com/spreadsheet/ccc?key=0Anqm9nuJ4T9CdDMyZnF4ZWw2bFpzMjV2ejNZOGJzblE&usp=sharing">VIEW BRACKET</h2>');
			print('<div  style="overflow:auto" align="center">');
			print('<h2>SCHEDULE</h2>');
			print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911"
		align="center" >');
		

			
			$result = mysql_query("SELECT * FROM beta_schedule Where type=1 ORDER BY Date, Time ASC");

			    	//Create tables for teams
print('<td> GID </td>'); 	
print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');     
print('<td> Team2</td>');     
print('<td> Location </td>'); 

print('<td> Winner </td>');
print('<td> Loser </td>');
print('<td> Forfeit </td>'); 
print('<td> Forfeit </td>');               

while ($row = mysql_fetch_array($result))

                  {
$gid=$row['GId'];
//echo "the firstname is: $name"; 
print('<tr>');
print('<td>' . $gid .  '</td>');
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
                  
		// if score has been reported than get the winner and loser
				$scores = mysql_query("SELECT * FROM beta_reportedScore WHERE GID = '$gid'");
				if($scoreRow = mysql_fetch_row($scores)) {
					$i = 0;
					
					foreach($scoreRow as $gameStat) {
						$i++;
						//get Team Sport Results
						
						if($i > 2) {
							if($gameStat != 0) {
								
									$findInd = mysql_query("SELECT * FROM beta_individual Where Iid= '$gameStat'");
								$indRow = mysql_fetch_array($findInd);
								print('<td>'. $indRow["fname"] . " " . $indRow["lname"] .  "-" . $indRow["dorm"] . '</td>');
								
															

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
print('<br />');






?>

