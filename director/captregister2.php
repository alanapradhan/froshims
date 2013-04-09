<?

    // require common code
    require_once("includes/common.php"); 
    
    // escape username and both passwords for safety
    $firstname = mysql_real_escape_string($_POST["firstname"]);
    $lastname = mysql_real_escape_string($_POST["lastname"]);
$teamSport1= mysql_real_escape_string($_POST["teamSport1"]);
$teamSport2= mysql_real_escape_string($_POST["teamSport2"]);
$individualSport= mysql_real_escape_string($_POST["individualSport"]);    
$dorm= mysql_real_escape_string($_POST["Dorm"]);
$entryway= mysql_real_escape_string($_POST["entryway"]);
    $email = mysql_real_escape_string($_POST["Email"]);
    $phone= mysql_real_escape_string($_POST["Phone"]);
	$password1= mysql_real_escape_string($_POST["password1"]);
$password2= mysql_real_escape_string($_POST["password2"]);

$captainName = $firstname." ".$lastname; 



if ($_POST["firstname"] == "" || $_POST["lastname"] == "" ||
    $_POST["Game"] == "blank"||
$_POST["Dorm"]== "blank"||$_POST["Email"] == ""||
    $_POST["Phone"] == ""|| $_POST["password1"] == "" 
|| $_POST["password2"] == "")
    {
         apologize("There are blank fields!");

    }         


if($password1 != $password2)
{
apologize("Your passwords do not match");
}

          

/*$check = mysql_query("SELECT TeamName FROM captain WHERE TeamName =
'$TeamName'");

         if(mysql_num_rows($check)!=0)
           apologize("Team Name already exists! If you signed up for a non-team sport, 
		   someone has already registered under your name. 
		   Please use your middle name to sign up instead of your last name.");        
*/
 
if ($teamSport1!=""){
 $insert20 = mysql_query("INSERT INTO beta_captRegister (captFname, captLname, sport, email, 
phone,password)
         
VALUES('$firstname','$lastname','$teamSport1','$email','$phone','$password1')");

$result = mysql_query("SELECT Tid FROM beta_captRegister WHERE email = '$email' AND sport='$teamSport1'"); 
$row = mysql_fetch_array($result);
$Tid= $row["Tid"];

$insert2 = mysql_query("INSERT INTO beta_teams (Tid, dorm, entryway, 
sport)
         
VALUES('$Tid','$dorm','$entryway','$teamSport1')");
         }
		 
if ($teamSport2!=""){

$insert40 = mysql_query("INSERT INTO beta_captRegister (captFname, captLname, sport, email, 
phone,password)
         
VALUES('$firstname','$lastname','$teamSport2','$email','$phone','$password1')");

$result2 = mysql_query("SELECT Tid FROM beta_captRegister WHERE email = '$email' and sport='$teamSport2'"); 
$row = mysql_fetch_array($result2);
$Tid= $row["Tid"];

$insert4 = mysql_query("INSERT INTO beta_teams (Tid, dorm, entryway, 
sport)
         
VALUES('$Tid','$dorm','$entryway','$teamSport2')");
         }
		 
if ($individualSport!=""){
$insert50 = mysql_query("INSERT INTO beta_individual (dorm, fname, lname, email, phone, sport, password)
         
VALUES('$dorm','$firstname','$lastname','$email','$phone','$individualSport','$password1')");

}
		 
		 
$to = $email; 
$subject = '[FROSHIMS] You have successfully registered for ForshIMs';
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
<span style="font-size:22px;font-weight:bold;color:#540000;font-family:arial;line-height:110%;">Frosh IMs New Captain Announcement</span><br>

Dear ' . $firstname .',<br /><br /> 
Thank you for registering with the FroshIMs team. You will now receive email reminders of scheduled games. <br />

<strong>The following is your user information:</strong> <br /><br />
 
Username: '.$email.' <br /> 
Password: ' .$password1.'<br />
Contact Email: '.$email.'<br />
Phone: '.$phone.'<br />
Sport(s):
'.$teamSport1.'<br />
'.$teamSport2.'<br />
'.$individualSport.'<br />

Dorm: '.$dorm.'<br />
Enrtyway: '.$entryway.'<br />
<br />

If any of this information is incorrect, please email as at harvardfroshims@gmail.com. If you are all set please use the 
Captain sign-in to see your schedule, contact information of the other teams, and to report scores of games. This is a new
system being implemented this year, so if you find any errors please email the webmaster at alana.cool@gmail.com. 
Your understanding is appreciated. Enjoy the new semester and remember that all positions are still up for grabs!<br /> <br />  
 
 



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

         // inorder to keep track of the surrent user and his transactions
         //$_SESSION["uid"] = mysql_insert_id();
         
         // log them in
         redirect("http://www.hcs.harvard.edu/~froshims/?page_id=192");
//         }

                  
?>
