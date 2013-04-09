<?
 require_once("includes/common.php");

$result = mysql_query("SELECT * FROM dorm_Standings_vw");
while ($row = mysql_fetch_array($result)){

$dorm= $row["Dorm"];
$points= $row["total"];
$compPoints= $comp["total"];
switch($dorm){

case "ApleyCourtMassHall":
 $total = ($points * 2.5);
 $dorm= "Apley/Mass";
break;
case "Canaday":
 $total = $points;        
break;
case "Grays":
$total = ($points * 1.5);
break;

case "Greenough":
 $total = ($points *1.5);
break;

case "Hollis":
 $total = ($points *2.5);
break;

case "Holworthy":
 $total = ($points *1.5);
break;

case "Hurlbut":
 $total = ($points *2.5);
break;

case "Lionel":
 $total = ($points *2.5);
break;

case "Matthews":
 $total = $points;        
break;

case "Mower":
 $total = ($points *2.5);
break;

case "Pennypacker":
 $total = ($points *1.5);
break;

case "Stoughton":
$total = ($points *2.5);
break;

case "Straus":
 $total = ($points *1.5);
break;

case "Thayer":
 $total = $points;        
break;
case "Weld":
 $total = $points;        
break;
case "Wigglesworth":
 $total = $points;
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

