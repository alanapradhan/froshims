<?

require_once("includes/common.php");
$j=0;

$dormarr= array("Apley Court", "Canaday", 
"Grays","Greenough","Hollis","Holworthy","Hurlbut","Lionel","Mass 
Hall","Matthews","Mower","Pennypacker","Stoughton","Straus","Thayer","Weld","Wigglesworth");

//print_r($dormarr[1]);
for($i=0 ;$i< 17; $i++)
{

$result = mysql_query("SELECT TeamName FROM captain WHERE Dorm = '$dormarr[$i]' AND 
Game != 'Pingpong'" );

while ($row = mysql_fetch_array($result)){

$teamarr[$dormarr[$i]][$j] = $row["TeamName"];

$j++;
}
$j=0;

}
echo "<table border='1'>";
foreach( $teamarr as $category )
{
   foreach( $category as $product => $price )
   {
     echo "<tr><td>$product:</td>
               <td>$price:</td></tr>";
   }
}
echo "</table>";
echo $teamarr[0][0];
/*
$result = mysql_query("SELECT Win FROM schedule WHERE Win != '' AND
Game != 'Pingpong'" );

for($i=0 ;$i< 17; $i++){

$teamcount=count($teamarr[$i]);

for($j=0; $j =< $teamcount; $j++){ 

while ($row = mysql_fetch_array($result)){

    if ($row == teamarr[$i][$j]) {
        ;
    }
    
}
}
//print_r($teamarr[16][2]);

//echo $teamarr[0][1];
*/
?>
