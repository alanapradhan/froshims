<?

    // require common code
    require_once("includes/common.php");
$gid = mysql_real_escape_string($_POST["gid"]);

$g1 = mysql_real_escape_string($_POST["g1"]);
if($g1=="blank")
apologize("Please select the Game Type");

if($g1 =="Pingpong" || $g1=="Squash"){
$type="I";
}
else{
$type="T";
}
$m1 = mysql_real_escape_string($_POST["m1"]);
$d1 = mysql_real_escape_string($_POST["d1"]);
    //$d1 = mysql_real_escape_string($_POST["d1"]);
$team11= mysql_real_escape_string($_POST["team11"]);
$team21= mysql_real_escape_string($_POST["team21"]);
    $l1 = mysql_real_escape_string($_POST["l1"]);
    $t1= mysql_real_escape_string($_POST["t1"]);
$year  = date("Y");
	$date= $year."-".$m1."-".$d1;
$result = mysql_query("UPDATE beta_schedule SET GameType= '$g1', Date= '$date',
Time = '$t1', Team1 = '$team11', Team2 = '$team21', Location = '$l1', EmailSent = 0 WHERE GId= 
'$gid'");
$text="the gid is:";

//List of successful game entries
$success= mysql_query("SELECT * FROM beta_schedule WHERE GameType = '$g1' and EmailSent=0");

print('<div> Are These Correct? <br />If so, click here to 
<a href="revemaillist.php?game='.$g1.'">send
emails</a>. <br />If
not, click here to <a href="seesched2.php?game='.$g1.'"> edit the schedule</a>. <br
/> 
Otherwise
return to the 
<a href="director.php">Director Homepage</a></div>');

print('<table cellpadding="0" cellspacing="0" style="width:590px;" 
bgcolor="#FFFFFF" border="2" align="center" >');

print('<td> Date </td>');
print('<td> Time </td>');
print('<td> Team1 </td>');
print('<td> Team2</td>');
print('<td> Location </td>');

  

$row = mysql_fetch_array($success);

                  
$gid=$row['gid'];

print('<tr>');

print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
print('<td>' . $row["Team1"] .  '</td>');
print('<td>' . $row["Team2"] .  '</td>');
print('<td>' . $row["Location"] .  '</td>');
print('</tr>');

print('</table>');

echo $text . " " . $g1; 
//redirect("director.php");
?>
