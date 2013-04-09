<?
 require_once("includes/common.php");

$result = mysql_query("SELECT * FROM dorm_Standings_vw");
while ($row = mysql_fetch_array($result)){

$dorm= $row["Dorm"];
$points= $row["total"];
$compPoints= $comp["total"];
switch($dorm){

case "ApleyCourtMassHall":
 $total = ($points * 2.5)+837.5;
 $dorm= "Apley/Mass";
break;
case "Canaday":
 $total = $points+197+9;        
break;
case "Grays":
$total = ($points * 1.5)+853.5;
break;

case "Greenough":
 $total = ($points *1.5)+160.5;
break;

case "Hollis":
 $total = ($points *2.5)+200;
break;

case "Holworthy":
 $total = ($points *1.5)-22.5;
break;

case "Hurlbut":
 $total = ($points *2.5)+52.5;
break;

case "Lionel":
 $total = ($points *2.5)+302.5;
break;

case "Matthews":
 $total = $points+496+9;        
break;

case "Mower":
 $total = ($points *2.5)-25;
break;

case "Pennypacker":
 $total = ($points *1.5)+69+14;
break;

case "Stoughton":
$total = ($points *2.5)+305;
break;

case "Straus":
 $total = ($points *1.5)+309;
break;

case "Thayer":
 $total = $points+507;        
break;
case "Weld":
 $total = $points+441;        
break;
case "Wigglesworth":
 $total = $points+557+34;
break;

default;
$total = $points;
$dorm = $dorm;
break;

}

$insert = mysql_query("UPDATE dorm_FinalSatndings SET total = '$total' WHERE dorm
= '$dorm'");
echo $total;

}

