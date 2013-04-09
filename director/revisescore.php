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

<form action="revisescore2.php" method="post" name="editsched">
 <table cellspacing="0" border="1px">
  <caption>
    Change Reported Score
  </caption>
  <tr>
<th scope="col">Game Type</th>
<th scope="col">Date</th>
   <th scope="col">Time</th>
   <th scope="col">Team 1</th>
   <th scope="col">Team 2</th>
  <th scope="col">Location</th>
  <th scope="col">Winner</th>
  <th scope="col">Loser</th>
  <th scope="col">Forfeit</th>
</tr>
<tr>
<?
$revise = mysql_real_escape_string($_GET['revise']);
$GameType =  mysql_real_escape_string($_GET['game']);
$result = mysql_query("SELECT * FROM schedule Where gid = $revise");
while ($row = mysql_fetch_array($result))

                  {
print('<tr>');

//print('<td>PHP is Read</td>');
//print('<td>' . $revise . '</td>');
                    print('<td>' . $row["Game"] .  '</td>');

print('<td>' . $row["Date"] .  '</td>');

print('<td>' . $row["Time"] .  '</td>');

print('<td>' . $row["Team1"] .  '</td>');

print('<td>' . $row["Team2"] .  '</td>');

print('<td>' . $row["Location"] .  '</td>');
print('<td>' . $row["Win"] .  '</td>');
print('<td>' . $row["Loss"] .  '</td>');
print('<td>' . $row["Forfeit"] .  '</td>');


print('</tr>');
$team1= $row["Team1"];
$team2= $row["Team2"];

}

print('</tr>
<tr>
 <td>
</td>
 <td>
</td>
 <td>
</td>
 <td>
</td>
 <td>
</td>
 <td>
</td>


<td>

<select name="w1">
<option value="">Select Team</option>
<option value="'.$team1.'">'.$team1.'</option>
<option value="'.$team2.'">'.$team2.'</option>
>
</select>
</td>
                                        <td>
<select name="l1">
<option value="">Select Team</option>
<option value="'.$team1.'">'.$team1.'</option>
<option value="'.$team2.'">'.$team2.'</option>
</select>

</td>
<td>
<select name="f1">
<option value="">Select Team</option>
<option value="'.$team1.'">'.$team1.'</option>
<option value="'.$team2.'">'.$team2.'</option>
</select>');
?>
<tr>
          <input type="hidden" value="<?php echo $_GET["revise"]; ?>" name="gid">
</tr>
</table>
<input type="submit" class="save" value="Save" />
</form>
