<?php
/*
*
* Small program to check if the Player was not signed up at a captain for any of the sports they registered for
*
*/
require_once("includes/common.php"); 
/*
 * Team Sport Email
 * 
 */
 $Cid = 237;
$emailVar= mysql_query("SELECT * FROM beta_captRegister WHERE Cid=".$Cid);
$row= mysql_fetch_array($emailVar);
$firstname=$row["captFname"];
$email=$row["email"];
$password=$row["password"];
$phone=$row["phone"];
$emailVar= mysql_query("SELECT * FROM beta_teams WHERE Cid=".$Cid);
$row= mysql_fetch_array($emailVar);
$entryway=$row["entryway"];
$dorm=$row["dorm"];

if($Cid !="0"){
$to = $email; 
$subject = '[FROSHIMS] You have successfully registered a team for FroshIMs';
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
id=editableImg1 SRC="http://www.hcs.harvard.edu/~froshims/wp-content/uploads/2012/01/header-text.png" BORDER="0" title="Frosh IMs"  alt="FroshIMs" align="center"></a></center></td>
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
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs New Captain Announcement</span><br>

Dear ' . $firstname .',<br /><br /> 
Thank you for signing up to serve as a captain for FroshIMs. You will now receive email reminders of scheduled games and be able to report game scores. <br />

<strong>The following is your user information:</strong> <br /><br />
 
Username: '.$email.' <br /> 
Password: ' .$password.'<br />
Contact Email: '.$email.'<br />
Phone: '.$phone.'<br />
Sport(s): <br />
'.$teamSport1.'<br />
'.$teamSport2.'<br /><br />
Dorm: '.$dorm.'<br />
Enrtyway: '.$entryway.'<br />
<br />

If any of this information is incorrect, please email as at harvardfroshims@gmail.com. If you are all set please use the 
Captain Portal to see your schedule, contact information of the other teams, and to report scores of games. This is a new
system is still under construction, so if you find any errors please email the webmaster at alana.cool@gmail.com. 
Your understanding is appreciated. Enjoy the new semester and remember that all rankings are still up for grabs!<br /> <br />  
 
 



Thank you,<br /> 

Froshims Directors<br /> <br /> <br /> 

Please have players refer to the
<a href="https://www.hcs.harvard.edu/~froshims/">FROSHIMs website </a>for realtime updates of schedules and standings.<br /><br />
</p>




</td>
</tr>


<tr>
<td style="background-color:#FFFFCC;border-top:10px solid #FFFFFF;" valign="top">
<span style="font-size:10px;color:#333333;line-height:100%;font-family:verdana;">

Registration Email <br />
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
if(mail($to, $subject, $message,$headers)){
echo("hi ".$firstname);
}

}
?>