<?php



require_once("includes/common.php")

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Frosh IMs</title>

<style type="text/css">

<!--

body {

	font: 80% Verdana, Arial, Helvetica, sans-serif;

	background: #FFFFFF;

	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */

	padding: 0;

	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */

	color: #000000;

}



/* Tips for Elastic layouts 

1. Since the elastic layouts overall sizing is based on the user's default fonts size, they are more unpredictable. Used correctly, they are also more accessible for those that need larger fonts size since the line length remains proportionate.

2. Sizing of divs in this layout are based on the 100% font size in the body element. If you decrease the text size overall by using a font-size: 80% on the body element or the #container, remember that the entire layout will downsize proportionately. You may want to increase the widths of the various divs to compensate for this.

3. If font sizing is changed in differing amounts on each div instead of on the overall design (ie: #sidebar1 is given a 70% font size and #mainContent is given an 85% font size), this will proportionately change each of the divs overall size. You may want to adjust based on your final font sizing.

*/

.oneColElsCtrHdr #container {

	
	width: 1024px;  /* this width will create a container that will fit in an 800px browser window if text is left at browser default font sizes */
	
	height: 1000px;
	
	background: #FFFFFF;

	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */

	/*border: 1px solid #000000;*/

	text-align: left; /* this overrides the text-align: center on the body element. */
	

}

.oneColElsCtrHdr #header { 

	background: #FFFFFF; 

	padding: 0 10px 0 20px;  /* this padding matches the left alignment of the elements in the divs that appear beneath it. If an image is used in the #header instead of text, you may want to remove the padding. */

} 

.oneColElsCtrHdr #header h1 {

	margin: 0; /* zeroing the margin of the last element in the #header div will avoid margin collapse - an unexplainable space between divs. If the div has a border around it, this is not necessary as that also avoids the margin collapse */

	padding: 10px 0; /* using padding instead of margin will allow you to keep the element away from the edges of the div */

}

.oneColElsCtrHdr #mainContent {

	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */

	/*background: url(images/sheild.png);

	background-repeat:no-repeat;

	background-position:center */
	
	
	
	

}

#foot { 

	padding: 30px;
	margin: 800px 0 0 0;
	background:#DDDDDD;

} 

/* .oneColElsCtrHdr #footer p {

	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */

	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */

} */

#apDiv1 {
	position:absolute;
	width:821px;
	height:215px;
	z-index:1;
	left: 560px;
	top: 60px;
}

#whistle {
	
	width:310px;
	height:178px;
	z-index:2;
	left: 216px;
	top: 391px;
}

#apDiv3 {
	position:absolute;
	width:200px;
	height:38px;
	z-index:3;
	left: 193px;
	top: 32px;
}

#apDiv4 {
	position:absolute;
	width:101px;
	height:47px;
	z-index:4;
	left: 180px;
	top: 346px;
}

#apDiv5 {
	position:absolute;
	width:200px;
	height:35px;
	z-index:5;
	left: 574px;
	top: 334px;
}

#apDiv6 {
	position:absolute;
	width:200px;
	height:48px;
	z-index:6;
	left: 1109px;

	top: 346px;
}

#signup {
	position:absolute;
	width:200px;
	height:115px;
	z-index:7;
	left: 33px;
	top: 705px;
}

#apDiv8 {
	position:absolute;
	width:200px;
	height:43px;
	z-index:8;
	left: 1109px;
	top: 660px;
}

#scoreboard {
	position:absolute;
	width:310px;
	height:204px;
	z-index:1;
	left: 1059px;
	top: 407px;
}

#apDiv10 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:9;
	left: 347px;
	top: 663px;
}
#headerbanner {
	position:absolute;
	width:485px;
	height:223px;
	align: center
	z-index:10;
	left: 459px;
	top: 72px;
}
#schedelement {
	position:absolute;
	width:614px;
	height:386px;
	z-index:11;
	left: 391px;
	top: 407px;
	border:#666;
dashed; 
}
#apDiv2 {
	position:absolute;
	width:1021px;
	height:800px;
	z-index:1;
	left: 190px;
	top: 248px;
}
#apDiv7 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:12;
}
#apDiv9 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv11 {
	position:absolute;
	width:265px;
	height:177px;
	z-index:12;
	left: 89px;
	top: 422px;
}
#borderlinetop {
	position:absolute;
	width:948px;
	height:25px;
	z-index:13;
	left: 208px;
	top: 294px;
}
#apDiv12 {
	position:absolute;
	width:15px;
	height:674px;
	z-index:14;
	left: 368px;
	top: 310px;
}
#apDiv13 {
	position:absolute;
	width:17px;
	height:534px;
	z-index:1;
	left: 828px;
	top: 63px;
}
#apDiv14 {
	position:absolute;
	width:297px;
	height:17px;
	z-index:2;
	left: -113px;
	top: 395px;
}
#apDiv15 {
	position:absolute;
	width:200px;
	height:20px;
	z-index:3;
	left: 840px;
	top: 398px;
}
#apDiv16 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:15;
}
#apDiv17 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 29px;
	top: -1386px;
}
#apDiv18 {
	position:absolute;
	width:181px;
	height:45px;
	z-index:15;
	left: 79px;
	top: 654px;
}
#apDiv19 {
	position:absolute;
	width:282px;
	height:172px;
	z-index:16;
	left: 1091px;
	top: 722px;
}
#apDiv20 {
	position:absolute;
	width:600px;
	height:32px;
	z-index:17;
	left: 390px;
	top: 387px;
}

-->

</style></head>



<body class="oneColElsCtrHdr">
<div id="apDiv2"><img src="images/sheild.png" width="666" height="742" />
  <div id="apDiv14"><img src="images/borderlinemid.png" width="290" height="20" /></div>
  <div id="apDiv15"><img src="images/borderlinemid.png" width="300" height="20" /></div>
<div id="apDiv13"><img src="images/borderlineleft.png" width="20" height="647" /></div>
</div>



<div id="container">

  <div id="header">
    <div id="apDiv11"><a 
href="http://www.hcs.harvard.edu/froshims/rules.php"><img 
src="images/whistle.png" width="251" height="141" 
/></a></div>

    <div id="headerbanner"><img src="images/homepage banner.png" width="474" height="232" /></div>
    <div id="borderlinetop"><img src="images/borderlinetop.png" width="947" height="20" /></div>
    <div id="apDiv12"><img src="images/borderlineleft.png" width="20" height="647" /></div>
<h1>&nbsp;</h1>

  <!-- end #header --></div>



  <div id="mainContent" >
    <div id="apDiv3"><img src="images/header text.png" width="603" height="41" alt="header text" /></div>

<div id="whistle">

  <div id="scoreboard"><a 
href="http://www.hcs.harvard.edu/froshims/standings.php"><img src="images/board.png" width="306" height="172" /></a></div>
  <div class="banner"></div>
</div>

<div id="apDiv4"><img src="images/rules.png" width="90" height="37" alt="rules" /></div>




    <div id="apDiv6"><img src="images/standings.png" width="210" height="37" alt="standings text" /></div>


    <div id="apDiv5"><img src="images/schedule_text.png" width="250" height="37" alt="schedule text" /></div>

    <div id="apDiv19"><img src="images/dugoutphoto.png" width="290" height="180" /></div>
    
<div id="schedelement" style="overflow:auto;" border="1">


    <table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
align="center" >

        

<?







$result = mysql_query("SELECT Game,Date,Time,Team1,Team2,Location

						FROM schedule WHERE Date BETWEEN DATE_ADD(NOW(), INTERVAL -1 DAY) AND
						DATE_ADD(NOW(), INTERVAL 7 DAY) ORDER BY Date ASC, Time ASC"); 

                    print('<td> Game </td>');

                    print('<td> Date </td>');

                    print('<td> Time </td>');

                    print('<td> Team 1 </td>');

                    print('<td> Team 2</td>');

                    print('<td> Location </td>');







                  while ($row = mysql_fetch_array($result))

                  {
$date= $row["Date"];
$time=$row["Time"];
$date = date('d M', strtotime($date));
$time = date('g:i a', strtotime($time));

print('<tr>');

print('<td>' . $row["Game"] .  '</td>');

print('<td>' .$date.  '</td>');

print('<td>' .$time.  '</td>');

print('<td>' . $row["Team1"] .  '</td>');

print('<td>' . $row["Team2"] .  '</td>');

print('<td>' . $row["Location"] .  '</td>');

print('</tr>'); 



                  }

?>  

</table>

    </div>
    <div id="apDiv20">Full Schedules: 
	
	<?
$now= date("m",time());
			
				 //Spring
				 if(7>now) {
				  $result = mysql_query("SELECT GameType FROM SpringGames");
				 
				 }
				 else {
				 $result = mysql_query("SELECT GameType FROM FallGames");
				 }

				 while ($row=mysql_fetch_array($result)) {				 
	$GameType = $row["GameType"];
    echo " <a href='schedisolate.php?game=".$GameType."'>".$GameType."</a>";
	
	}
				?> 
    <p>&nbsp;</p>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
 
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
   <h1 align="center">Announcements</h1>
   <p align="center">Sign-up to be a Frosh IMs Director. 
   <a href="http://www.hcs.harvard.edu/~froshims/blog/?page_id=53">Click Here</a> for the online application!</p>
  <script src="https://spreadsheets0.google.com/gpub?url=http%3A%2F%2Ftngmqk5kknht7idkbhrks3qtltpmeg9f-ss-opensocial.googleusercontent.com%2Fgadgets%2Fifr%3Fup_title%3DAnswers%26up_enablegrouping%3D1%26up_showfilters%3D1%26up__table_query_url%3Dhttps%253A%252F%252Fspreadsheets0.google.com%252Fspreadsheet%252Ftq%253Frange%253DA%25253AB%2526key%253D0Ao793Az9LYC6dDZJXzAxWl8zbjJkdTBZVUJ5VEhneFE%2526gid%253D0%2526pub%253D1%26url%3Dhttp%253A%252F%252Fwww.google.com%252Fig%252Fmodules%252Ftable.xml%26spreadsheets%3Dspreadsheets&height=320&width=450"></script>
  </div>



    <div id="signup"><a href="http://www.hcs.harvard.edu/froshims/captregister.php"><img 

src="images/signup.png" border="0" width="330" height="210" /></a></div>

  <div id="apDiv8"><img src="images/dugout.png" width="250" height="37" alt="dugout" /></div>





  <div id="apDiv18"><img src="images/sign-up_text.png" width="250" height="37" /></div>
  <!-- end #mainContent -->
<div id="foot" >

    <p align="left"><a

href="http://www.hcs.harvard.edu/froshims/captlogin.php">Captain Login </a>| <a 

href="http://www.hcs.harvard.edu/froshims/login.php">Director Login</a> | 

Contact 

Us 

</p>

  <!-- end #footer --></div>
  </div>

  



</body>

</html>

