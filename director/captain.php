<?

    // require common code
    require_once("includes/commonRequired.php"); 

?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?                
if (isset($_SESSION['uid']))
{
	$uid = $_SESSION['uid'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;
?>


    <div align="center" style="margin: 10px;">
<table>
<tr>
<td><a href="index.php">Home</a></td>
</tr>
<tr>
<td><a href="captseesched.php">See Schedule</a></td>
</tr>
<tr>
<td><a href="captreportscore.php">Report Win/Foreit</a></td>
</tr>

<tr>
<td><a href="captteamlist2.php">Team Lists</a></td>
</tr>
<tr>
<td><a href="logout.php">Log Out</a></td>
</tr>
<tr>

</tr>
</table>
    </div>

</body>
</html>


