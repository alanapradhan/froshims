<?

    // require common code
    require_once("includes/common.php"); 
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>FreshmanIMs</title>
</head>

<form action="revisesched2.php" method="post" name="editsched">
 <table cellspacing="0">
  <caption>
    Revise Event
  </caption>
  <tr>
<th scope="col">Game Type</th>
<th scope="col">Date</th>
   <th scope="col">Time</th>
   <th scope="col">Team 1</th>
   <th scope="col">Team 2</th>
  <th scope="col">Location</th>
</tr>
<tr>
<?
$revise = mysql_real_escape_string($_GET['revise']);
$GameType =  mysql_real_escape_string($_GET['game']);
$result = mysql_query("SELECT * FROM beta_schedule Where GId = $revise");
while ($row = mysql_fetch_array($result))

                  {
print('<tr>');

//print('<td>PHP is Read</td>');
//print('<td>' . $revise . '</td>');
                    print('<td>' . $row["GameType"] .  '</td>');

print('<td>' . $row["Date"] .  '</td>');

print('<td>' . $row["Time"] .  '</td>');
/*
 * Code to print team name instead of Tid
 * 
 */
$type=$row['type'];
if($type==1){
$team1=$row["Team1"];
$findTeam1 = mysql_query("SELECT * FROM beta_individual Where Iid= '$team1'");
$team1Row= mysql_fetch_array($findTeam1);
print('<td>' . $team1Row["fname"] ." ". $team1Row["lname"] ."-". $team1Row["dorm"] .  '</td>');

//Individual 2
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

/*
 * End Code to print team name instead of Tid
 * 
 */

print('<td>' . $row["Location"] .  '</td>');


print('</tr>');
}
?>
</tr>
<tr>
 <td>
<?
$now= date("m",time());
			
				 //Spring
				 if(7>$now) {
				  $result = mysql_query("SELECT GameType FROM SpringGames");
				 
				 }
				 else {
				 $result = mysql_query("SELECT GameType FROM FallGames");
				 }

				 while ($row=mysql_fetch_array($result)) {				 
$GameType = $row["GameType"];
    $options.="<OPTION VALUE=\"$GameType\">".$GameType;
	}
		  print(' <select name="g1">
<option value="blank">Select Game Type</option>');
		  print($options);
		  print('</SELECT>');
?>      
</td>
<td>
<?
$now= date("m",time());
			
				 //Spring
				 if(7>$now) {
				  $result = mysql_query("SELECT * FROM SpringGames");
				 }
				 
				 else {
				 $result = mysql_query("SELECT * FROM FallGames");
				 }
				 
				 while ($row=mysql_fetch_array($result)) {				 
				$index=$row["Index"];
				 $month = $row["Month"];
    $months.="<OPTION VALUE=\"$index\">".$month;
	}
print('<select name="m1">
'.$months.'
</select>');
?>
<select name="d1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t1">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
<option value="20:30:00">20:30</option>
<option value="21:00:00">21:00</option>
<option value="21:30:00">21:30</option>
<option value="22:00:00">22:00</option>
<option value="22:30:00">22:30</option>
<option value="23:00:00">23:00</option>
</select>

</td>
<td>

<?
$game=mysql_real_escape_string($_REQUEST['game']);
$result = mysql_query("SELECT * FROM beta_signups WHERE sport= '$game' ORDER BY Tid ASC");

$options="";

while ($row=mysql_fetch_array($result)) {

    $dropDown = $row["dorm"] . " - " . $row["instance"];
    $TeamName = $row["Tid"];
    $options.="<OPTION VALUE=\"$TeamName\">".$dropDown;
	}
?>

<SELECT NAME=team11>
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT>

</td>

<td>

<?
$result = mysql_query("SELECT * FROM beta_signups WHERE sport= '$game' ORDER BY Tid ASC");

$options="";

while ($row=mysql_fetch_array($result)) {

    $dropDown = $row["dorm"] . " - " . $row["instance"];
    $TeamName = $row["Tid"];  
    $options.="<OPTION VALUE=\"$TeamName\">".$dropDown;
}
?>

<SELECT NAME=team21>
<OPTION VALUE=0>Choose
<?=$options?>         
</SELECT>    
</td>    
<td><input type="text" name="l1"/></td>
</tr>
<tr>
          <input type="hidden" value="<?php echo $_GET["revise"]; ?>" name="gid">
</tr>
</table>
<input type="submit" class="save" value="Save" />
</form>
