<?php

   print('<div style="height:300px;width:650px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;"><table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
align="center" >');

        




                    print('<td> Game </td>');

                    print('<td> Date </td>');

                    print('<td> Time </td>');

                    print('<td> Team 1 </td>');

                    print('<td> Team 2</td>');

                    print('<td> Location</td>');





$result=mysql_query("SELECT GameType,Date,Time,Team1,Team2,Location

						FROM beta_schedule WHERE Date BETWEEN DATE_ADD(NOW(), INTERVAL -1 DAY) AND
						DATE_ADD(NOW(), INTERVAL 7 DAY) and type=0 ORDER BY Date ASC, Time ASC");   


                  while ($row = mysql_fetch_array($result)){
                  	
$date= $row["Date"];
$time=$row["Time"];
$date = date('d M', strtotime($date));
$time = date('g:i a', strtotime($time));
$location=$row["Location"];

print('<tr>');

print('<td>' . $row["GameType"] .  '</td>');

print('<td>' .$date.  '</td>');

print('<td>' .$time.  '</td>');

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

if($location=="Cumnock Fields"){
	
	print('<td><a href="http://map.harvard.edu/?ctrx=756675&ctry=2960420&level=8&layers=Campus%20Base%20and%20Buildings,Map%20Text">' . $location .  '</a></td>');
}
else{
print('<td>' . $row["Location"] .  '</td>');
}
print('</tr>'); 



                  }



print('</table></div>')

?>

