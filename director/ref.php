<?
// require common code
    require_once("includes/common.php");
	
$composite = mysql_query("SELECT * FROM schedule WHERE Date <= CURDATE()");
$sentemails=0;
$to = 'alana.cool@gmail.com';
$subject = '[FROSHIMS] Game Composite Schedule';
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
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs Referee Composite</span><br><br />

Dear Mr. Glapa,<br /> 

<strong>The following is a composite of newly scheduled Froshims Games:</strong> <br /><br />

'.print('<td> Game </td>');

                    print('<td> Date </td>');

                    print('<td> Time </td>');

                    print('<td> Team 1 </td>');

                    print('<td> Team 2</td>');

                    print('<td> Location </td>');

					while ($row = mysql_fetch_array($composite))

                  {


print('<tr>');
print('<td>' . $row["Game"] .  '</td>');
print('<td>' . $row["Date"] .  '</td>');
print('<td>' . $row["Time"] .  '</td>');
print('<td>' . $row["Team1"] .  '</td>');

print('<td>' . $row["Team2"] .  '</td>');

print('<td>' . $row["Location"] .  '</td>');
print('</tr>');
$emailcount++;
} ' 

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
echo "The total emails sent =".$sentemails;
print ('<br />');
print('<a href="director.php">Director Home</a>');         
		 //redirect("director.php");


