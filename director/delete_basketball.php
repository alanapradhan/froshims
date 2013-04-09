/*
* score fix
*/
<?
require_once("includes/common.php");

$i =0;
$teamIds = mysql_query("SELECT Tid FROM beta_teamList WHERE sport = 'Basketball'");
while ($row = mysql_fetch_assoc($teamIds))
{
$tid = $row["Tid"];
$schedule_gid = mysql_query("SELECT GId FROM beta_schedule WHERE Team1 = '$tid' || Team2 = '$tid'");
while ($row_gid = mysql_fetch_assoc($schedule_gid)){
$gid = $row_gid ["GId"];
mysql_query("DELETE FROM beta_reportedScore WHERE GID ='$gid'");
$i++;
}
} 
echo "Successfully Deleted: $i games";
?>