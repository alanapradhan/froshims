<?

    // require common code
    require_once("includes/commonRequired.php"); 
    
$emailcount = mysql_real_escape_string($_POST["emailcount"]);
$sentemails = 0;

for($i=1; $i <= $emailcount ; $i++)

{ 

$gid = mysql_real_escape_string($_POST["game".$i]);

if($gid != ""){
$findteam1 = mysql_query("SELECT * FROM beta_schedule WHERE gid= '$gid'");

$row = mysql_fetch_array($findteam1);
                  
$gameType=$row["GameType"];
$team1=$row["Team1"];
$team2=$row["Team2"];
$date= $row["Date"];
$date= date('d M Y', strtotime($date));
$time= $row["Time"];
$time= date('h:i:s A',strtotime($time));
$location= $row["Location"];

$findTeamName1 = mysql_query("SELECT * FROM beta_teamList WHERE Tid= '$team1'");
$getteam1email = mysql_query("SELECT * FROM beta_captRegister WHERE Tid= 
'$team1'");

$row2 = mysql_fetch_array($getteam1email);
$rowTeamName1= mysql_fetch_array($findTeamName1);

$teamName1= $rowTeamName1["dorm"]." ".$rowTeamName1["name"]." ".$rowTeamName1["instance"];
$team1email=$row2["email"];
$player1Fname=$row2["captFname"];


//Find Team2 info
$findTeamName2 = mysql_query("SELECT * FROM beta_teamList WHERE Tid= '$team2'");
$getteam2email = mysql_query("SELECT * FROM beta_captRegister WHERE Tid=
'$team2'");

$row3 = mysql_fetch_array($getteam2email);
$rowTeamName2= mysql_fetch_array($findTeamName2);

$teamName2= $rowTeamName1["dorm"]." ".$rowTeamName2["name"]." ".$rowTeamName2["instance"];
$team2email=$row3["email"];
$player2Fname=$row3["captFname"];


$to = $team1email;
//$to = 'alana.cool@gmail.com';
$subject = '[FROSHIMS] Your '.$gameType.' Game has Been Re-Scheduled';
$message = '<html>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#540000">

<STYLE>
 .headerTop { background-color: red; border-top:0px solid #000000; border-bottom:0px solid #FFCC66; text-align:right; }
 .adminText { font-size:10px; color:#FFFFCC; line-height:200%; font-family:verdana; text-decoration:none; }
 .headerBar { background-color:#FFFFFF; border-top:0px solid #FFFFFF; border-bottom:0px solid #333333; }
 .title { font-size:22px; font-weight:bold; color:#336600; font-family:arial; line-height:110%; }
 .subTitle { font-size:11px; font-weight:normal; color:#666666; font-style:italic; font-family:arial; }
 td { font-size:12px; color:#000000; line-height:150%; font-family:trebuchet ms; }
 .footerRow { background-color:#FFFFCC; border-top:10px solid #FFFFFF; }
 .footerText { font-size:10px; color:#333333; line-height:100%; font-family:verdana; }
 a { color:#FF0000; color:#FF6600; color:#FF6600; }
</STYLE>



<table width="100%" cellpadding="10" cellspacing="0" class="backgroundTable" bgcolor="#540000">
<tr>
<td valign="top" align="center">

<table width="550" cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#540000;border-top:0px solid #000000;border-bottom:0px solid #FFCC66;text-align:right;" 
align="center"><span style="font-size:10px;color:#FFFFCC;line-height:200%;font-family:verdana;text-decoration:none;">Email 
not displaying correctly? <a href="*|ARCHIVE|*" 
style="font-size:10px;color:#FFFFCC;line-height:200%;font-family:verdana;text-decoration:none;">View it in your 
browser.</a></span></td>

</tr>
 
<tr>
<td style="background-color:#FFFFFF;border-top:0px solid #FFFFFF;border-bottom:0px solid #333333;"><center><a href=""><IMG 
id=editableImg1 SRC="http://www.hcs.harvard.edu/~froshims/images/header%20text.png" BORDER="0" title="Frosh IMs"  alt="FroshIMs" align="center"></a></center></td>
</tr>

</table>
<table width="650" cellpadding="10" cellspacing="0" bgcolor="#540000">
<tr>
<td></td>
</tr>
</table>
<table width="550" cellpadding="20" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#FFFFFF" valign="top" style="font-size:12px;color:#000000;line-height:150%;font-family:trebuchet ms;">

<p>
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs Schedule 
Announcement</span><br><br />

Dear ' . $player1Fname .',<br /> 

<strong>The following is the new game information:</strong> <br /><br />
 
Opponent: '.$teamName2.' <br /> 
Location: ' .$location.'<br />
Time: '.$time.'<br /> 
Date: '.$date.'<br /><br /> 

Please have players refer to the
<a href="https://www.hcs.harvard.edu/~froshims/">FROSHIMs website </a>for realtime updates.<br /><br />

Thank you,<br /> 

Froshims Directors
</p>




</td>
</tr>


<tr>
<td style="background-color:#FFFFCC;border-top:10px solid #FFFFFF;" valign="top">
<span style="font-size:10px;color:#333333;line-height:100%;font-family:verdana;">

Game Schedule Email <br />
<br />

Our mailing address is:<br />
harvardfroshims@gmail.com<br />
<br />
Our telephone:<br />
617-495-1521<br />

  
</span>
</td>
</tr>


</table>


</td>
</tr>

</table>


</body>
</html>';
$headers = 'From: harvardfroshims@gmail.com' . "\r\n" . 'Content-type: text/html' . "\r\n" . 
    'Reply-To: harvardfroshims@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$sentemails++;


$to = $team2email;
//$to = 'alana.cool@gmail.com';
$subject = '[FROSHIMS] Your '.$gameType.' Game has Been Re-Scheduled';
$message = '<html>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#540000">

<STYLE>
 .headerTop { background-color: red; border-top:0px solid #000000; border-bottom:0px solid #FFCC66; text-align:right; }
 .adminText { font-size:10px; color:#FFFFCC; line-height:200%; font-family:verdana; text-decoration:none; }
 .headerBar { background-color:#FFFFFF; border-top:0px solid #FFFFFF; border-bottom:0px solid #333333; }
 .title { font-size:22px; font-weight:bold; color:#336600; font-family:arial; line-height:110%; }
 .subTitle { font-size:11px; font-weight:normal; color:#666666; font-style:italic; font-family:arial; }
 td { font-size:12px; color:#000000; line-height:150%; font-family:trebuchet ms; }
 .footerRow { background-color:#FFFFCC; border-top:10px solid #FFFFFF; }
 .footerText { font-size:10px; color:#333333; line-height:100%; font-family:verdana; }
 a { color:#FF0000; color:#FF6600; color:#FF6600; }
</STYLE>



<table width="100%" cellpadding="10" cellspacing="0" class="backgroundTable" bgcolor="#540000">
<tr>
<td valign="top" align="center">

<table width="550" cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#540000;border-top:0px solid #000000;border-bottom:0px solid #FFCC66;text-align:right;" 
align="center"><span style="font-size:10px;color:#FFFFCC;line-height:200%;font-family:verdana;text-decoration:none;">Email 
not displaying correctly? <a href="*|ARCHIVE|*" 
style="font-size:10px;color:#FFFFCC;line-height:200%;font-family:verdana;text-decoration:none;">View it in your 
browser.</a></span></td>

</tr>
 
<tr>
<td style="background-color:#FFFFFF;border-top:0px solid #FFFFFF;border-bottom:0px solid #333333;"><center><a href=""><IMG 
id=editableImg1 SRC="http://www.hcs.harvard.edu/~froshims/images/header%20text.png" BORDER="0" title="Frosh IMs"  alt="FroshIMs" align="center"></a></center></td>
</tr>

</table>
<table width="650" cellpadding="10" cellspacing="0" bgcolor="#540000">
<tr>
<td></td>
</tr>
</table>

<table width="550" cellpadding="20" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#FFFFFF" valign="top" style="font-size:12px;color:#000000;line-height:150%;font-family:trebuchet ms;">

<p>
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs Schedule 
Announcement</span><br><br /> 

Dear ' . $player2Fname .',<br />

<strong>The following is the new game information:</strong> <br /><br />
 
Opponent: '.$teamName2 .' <br /> 
Location: ' .$location.'<br />
Time: '.$time.'<br /> 
Date: '.$date.'<br /><br /> 

Please have players refer to the
<a href="https://www.hcs.harvard.edu/~froshims/">FROSHIMs website </a>for realtime updates.<br /><br />

Thank you,<br /> 

Froshims Directors
</p>




</td>
</tr>


<tr>
<td style="background-color:#FFFFCC;border-top:10px solid #FFFFFF;" valign="top">
<span style="font-size:10px;color:#333333;line-height:100%;font-family:verdana;">

Game Schedule Email <br />
<br />

Our mailing address is:<br />
harvardIMs@gmail.com<br />
<br />
Our telephone:<br />
617-495-1521<br />

  
</span>
</td>
</tr>


</table>


</td>
</tr>

</table>


</body>
</html>';

$headers = 'From: harvardfroshims@gmail.com' . "\r\n" . 'Content-type: text/html' . "\r\n" .
    'Reply-To: harvardfroshims@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$sentemails++;

$result = mysql_query("UPDATE schedule SET EmailSent= 1 WHERE gid='$gid'");
}

}
echo "The total emails sent =".$sentemails;
print ('<br />');
print('<a href="director.php">Director Home</a>');         
		 //redirect("director.php");
?>

