<?

    // require common code
    require_once("includes/common.php"); 



//$GameType = mysql_real_escape_string($_REQUEST['game']);
$blank="";
//echo "the game is: $GameType";
$emailSent=0;
$result =mysql_query("SELECT s.*,t1.dorm,t1.name,t2.dorm,t2.name,
                        c1.email,c1.captFname,c1.captLname, 
                        c2.email,c2.captFname,c2.captLname
                      FROM beta_schedule AS s 
                      INNER JOIN  beta_teamList AS t1 ON s.Team1 = t1.Tid
                      INNER JOIN  beta_teamList AS t2 ON s.Team2 = t2.Tid
                      INNER JOIN beta_captRegister As c1 ON s.Team1 = c1.Tid
                      INNER JOIN beta_captRegister As c2 ON s.Team2 = c2.Tid
                      WHERE Date >= CURDATE() AND Date <= ADDDATE(CURDATE(),7) AND score=0 AND reminder=0 AND type=0 ORDER BY Date DESC");

while ($row = mysql_fetch_array($result)) {

$gid=$row['GId'];
print('<div>'.$gid.'</div><br />');


 

                  
$gameType=$row["GameType"];
$team1=$row[10];
$team2=$row["Team2"];
$date= $row["Date"];
$date= date('d M Y', strtotime($date));
$time= $row["Time"];
$time= date('h:i:s A',strtotime($time));
$location= $row["Location"];

$team1email=$row["Email"];
$player1Fname=$row2["Fname"];

$getteam2email = mysql_query("SELECT * FROM captain WHERE TeamName=
'$team2'");

$row3 = mysql_fetch_array($getteam2email);
$team2email=$row3["Email"];
$player2Fname=$row3["Fname"];


//$to = 'alana.cool@gmail.com';
$to = $team1email;
$subject = '[FROSHIMS] Reminder to Report the Score of Your '.$gameType.' Game';
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
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs Score Report Reminder</span><br><br />

Dear ' . $team1 .',<br /> 

<strong> If your team was the winner of the game listed below please remember to report the score of the match in order to be awarded
house points:</strong> <br /><br />
 
Opponent: '.$team2 .' <br /> 
Location: ' .$location.'<br />
Time: '.$time.'<br /> 
Date: '.$date.'<br /><br /> 

Instructions on how to report a score:<br /><br />

1. Login with the username and password you created when you signed up. If you have forgotten this information, you should have
a confirmation email containing these details. The link to the portal is on the bottom of the home page. Here is the direct URL:
 http://www.hcs.harvard.edu/froshims/captlogin.php<br />
 
2.Once logged in click "Report Win/Forfeit".<br />
 
3. Check off your team as the winner or the other team as forfeited.<br />

4. Click submit. You can check the reported score by going to "See Schedule" on the main captain portal page. If you report the score
incorrectly please email the correction to harvardfroshims@gmail.com.<br /><br />

If you have already reported the score please ignore this email. Finally, please have players refer to the
<a href="https://www.hcs.harvard.edu/~froshims/">FROSHIMs website </a>for realtime updates.<br /><br />

Thank you,<br /> 

Froshims Directors
</p>




</td>
</tr>


<tr>
<td style="background-color:#FFFFCC;border-top:10px solid #FFFFFF;" valign="top">
<span style="font-size:10px;color:#333333;line-height:100%;font-family:verdana;">

Report Score Reminder Email <br />
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

//mail($to, $subject, $message, $headers);
$emailSent++;

//$to = 'alana.cool@gmail.com';
$to = $team2email;
$subject = '[FROSHIMS] Reminder to Report the Score of Your '.$gameType.' Game';
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
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs Score Report Reminder</span><br><br /> 

Dear ' . $team2 .',<br />

<strong> If your team was the winner of the game listed below please remember to report the score of the match in order to be awarded
house points:</strong> <br /><br />
 
Opponent: '.$team1 .' <br /> 
Location: ' .$location.'<br />
Time: '.$time.'<br /> 
Date: '.$date.'<br /><br /> 

Instructions on how to report a score:<br /><br />

1. Login with the username and password you created when you signed up. If you have forgotten this information, you should have
a confirmation email containing these details. The link to the portal is on the bottom of the home page. Here is the direct URL:
 http://www.hcs.harvard.edu/froshims/captlogin.php<br />
 
2.Once logged in click "Report Win/Forfeit".<br />
 
3. Check off your team as the winner or the other team as forfeited.<br />

4. Click submit. You can check the reported score by going to "See Schedule" on the main captain portal page. If you report the score
incorrectly please email the correction to harvardfroshims@gmail.com.<br /><br />

 
If you have already reported the score please ignore this email. Finally, please have players refer to the
<a href="https://www.hcs.harvard.edu/~froshims/">FROSHIMs website </a>for realtime updates.<br /><br />

Thank you,<br /> 

Froshims Directors
</p>




</td>
</tr>


<tr>
<td style="background-color:#FFFFCC;border-top:10px solid #FFFFFF;" valign="top">
<span style="font-size:10px;color:#333333;line-height:100%;font-family:verdana;">

Report Score Reminder Email <br />
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

//mail($to, $subject, $message, $headers);
$emailSent++;

$update = mysql_query("UPDATE schedule SET OneHour = 1 WHERE gid='$gid'");
}
echo "Number of emails sent=".$emailSent;


?>
