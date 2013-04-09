<?

    // require common code
    require_once("includes/commonRequired.php"); 


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
<form action="editsched3.php" method="post" name="editsched">

<div align="center"> 
<table cellspacing="5">
  <caption>
   Schedule a Game
  </caption>

<?                                            

$GameType = mysql_real_escape_string($_REQUEST['game']);

$numRows= 25;
echo "the game is: $GameType";

print('<tr>
<td>Date</td>
   <td>Time</td>
   <td>Team 1</td>
   <td>Team 2</td>
  <td>Location</td>
</tr>');

print('<input type="hidden" value="'.$GameType.'" name="g">');

$result = mysql_query("SELECT * FROM beta_signups_vw WHERE sport= '$GameType' ORDER BY Tid ASC");
$resultIndvidual = mysql_query("SELECT * FROM beta_individual WHERE sport= '$GameType' ORDER BY dorm ASC");
$options="";
if($GameType == "Table Tennis" || $GameType=="Squash" ||$GameType=="Foosball")
{
while ($row=mysql_fetch_array($resultIndvidual)) {
    	
    $dropDown = $row["dorm"] . " - " . $row["fname"]. " " .$row["lname"];
    $TeamName = $row["Iid"];
    $options.="<OPTION VALUE=\"$TeamName\">".$dropDown;
}
}
else
{
while ($row=mysql_fetch_array($result)) {
    	
    $dropDown = $row["dorm"] . " - " . $row["instance"];
      $TeamName = $row["Tid"];
    $options.="<OPTION VALUE=\"$TeamName\">".$dropDown;

//$options ="<OPTION VALUE=/"'.$TeamName.'/">' .$dropDown. '</option>" ;

}
}

for ($i=1; $i<$numRows; $i++) {

print('<tr>');

$now= date("m",time());
strtotime($now);
			
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
print('<td><select name="m'.$i.'">
'.$months.'
</select>
<select name="d'.$i.'">
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
<select name="t'.$i.'">
<option value="10:00:00">10:00</option>
<option value="10:15:00">10:15</option>
<option value="10:30:00">10:30</option>
<option value="10:45:00">10:45</option>
<option value="11:00:00">11:00</option>
<option value="11:15:00">11:15</option>
<option value="11:30:00">11:30</option>
<option value="11:45:00">11:45</option>
<option value="12:00:00">12:00</option>
<option value="12:15:00">12:15</option>
<option value="12:30:00">12:30</option>
<option value="12:45:00">12:45</option>
<option value="13:00:00">13:00</option>
<option value="13:15:00">13:15</option>
<option value="13:30:00">13:30</option>
<option value="13:45:00">13:45</option>
<option value="14:00:00">14:00</option>
<option value="14:15:00">14:15</option>
<option value="14:30:00">14:30</option>
<option value="14:45:00">14:45</option>
<option value="15:00:00">15:00</option>
<option value="15:15:00">15:15</option>
<option value="15:30:00">15:30</option>
<option value="15:45:00">15:45</option>
<option value="16:00:00">16:00</option>
<option value="16:15:00">16:15</option>
<option value="16:30:00">16:30</option>
<option value="16:45:00">16:45</option>
<option value="17:00:00">17:00</option>
<option value="17:15:00">17:15</option>
<option value="17:30:00">17:30</option>
<option value="17:45:00">17:45</option>
<option value="18:00:00">18:00</option>
<option value="18:15:00">18:15</option>
<option value="18:30:00">18:30</option>
<option value="18:45:00">18:45</option>
<option value="19:00:00">19:00</option>
<option value="19:15:00">19:15</option>
<option value="19:30:00">19:30</option>
<option value="19:45:00">19:45</option>
<option value="20:00:00">20:00</option>
<option value="20:15:00">20:15</option>
<option value="20:30:00">20:30</option>
<option value="20:45:00">20:45</option>
<option value="21:00:00">21:00</option>
<option value="21:15:00">21:15</option>
<option value="21:30:00">21:30</option>
<option value="21:45:00">21:45</option>
<option value="22:00:00">22:00</option>
<option value="22:15:00">22:15</option>
<option value="22:30:00">22:30</option>
<option value="22:45:00">22:45</option>
<option value="23:00:00">23:00</option>

</select>

</td>');


print('<td>');
print('<SELECT NAME="team1'.$i.'">
<OPTION VALUE=0>Choose</option>'.$options.'</SELECT></td>');
print('</td>');

print('<td>');
print('<SELECT NAME="team2'.$i.'">
<OPTION VALUE=0>Choose</option>'.$options.'</SELECT></td>');
print('</td>');

print('<td><input type="text" name="l'.$i.'"/></td>');

// last line of for loop
print('</tr>');
}

echo "the month is: $now";
?>


<td><a href="director.php">Home</a></td>
<td><a href="editsched.php">Edit Schedule</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Teams</a></td>


    </table>       
</div>                       
<input type="submit" class="save" value="Save" />
</form>                               
                                                       </body>
                                                     </html>
                                                                    
