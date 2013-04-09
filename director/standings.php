<?
require_once("includes/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Standings Board</title>
<link href="script/styles_standings.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page-wrap">
  <div id="mainContent">
	<h1 id="heading"> Standings Board</h1>
    
    <div id="left">
<table border="0px" cellspacing="30px" cellpadding="0" style="border-spacing: 40px 30px;">
<?
$pull = mysql_query("SELECT * FROM dorm_FinalSatndings ORDER BY total DESC"); 
$i=1;

while ($rows = mysql_fetch_array($pull)){

$dorms[$i]=$rows["Dorm"];

if ($dorms[$i]=='Apley/Mass') {
$dorms[$i]='ApleyCourtMassHall';
}
$points[$i]=$rows["Total"];
$i++;
}

for($i=1; $i<7; $i++){
if($dorms[$i]=='ApleyCourtMassHall')
{

print('<tr valign= middle>');
print('<td><h3>'.$i.'.</h3></td>
    <td class="box '. $dorms[$i].'">Apley/Mass<br />'.$points[$i].' <span class="points">pts</span></td>');
}

else {
print('<tr valign= "middle">');
print('<td><h3>'.$i.'.</h3></td>
    <td class="box '. $dorms[$i].'">'.$dorms[$i].'<br />'.$points[$i].' <span class="points">pts</span></td>');
}
	$j= $i+6;
if($dorms[$j]=='ApleyCourtMassHall')
{


print('<td><h3>'.$j.'.</h3></td>
    <td class="box '. $dorms[$j].'">Apley/Mass<br />'.$points[$j].' <span class="points">pts</span></td>');
}

else {
print('<td><h3>'.$j.'.</h3></td>
    <td class="box '. $dorms[$j].'">'.$dorms[$j].'<br />'.$points[$j].' <span class="points">pts</span></td>');
	}
$k= $j+6;

if($k <=16){
if($dorms[$k]=='ApleyCourtMassHall')
{

print('<td><h3>'.$k.'.</h3></td>
    <td class="box '. $dorms[$k].'">Apley/Mass<br />'.$points[$k].' <span class="points">pts</span></td>');
}
else {
print('<td><h3>'.$k.'.</h3></td>
<td class="box '. $dorms[$k].'">'.$dorms[$k].'<br />'.$points[$k].' <span class="points">pts</span></td>');
print('</tr>');
}
}

else{
print('</tr>');

}

}


?>
</table>
</div>    
</div>
</div>
</body>
</html>
