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
<div align="center">
      <form action="teamlist2.php" method="post">
        <table border="0">
     <?

       //$uid = $_SESSION["uid"];
  // Select members close to user
                 
				 $now= date("m",time());
			
				 //Spring
				 if(7>$now) {
				  $result = mysql_query("SELECT GameType FROM SpringGames");
				 
				 }
				 else {
				 $result = mysql_query("SELECT GameType FROM FallGames");
				 }
				

                 // if results are returned populate list
                    while ($row = mysql_fetch_array($result))
                    {
                        $GameType = $row["GameType"];
                                               
                            
				echo "  <div style='margin: 10px;' align= 'center'>
                            View: <a href='teamlist2.php?game=" . $GameType . "'>
                            ". $GameType . "</a><div/>";
                        }
    ?>

<?
               // $uid = $_SESSION["uid"];

                //if ($uid != 1 || $uid != 2 || $uid != 3 ||$uid != 4 ||$uid != 5)
                //{
                  //      redirect("apology.php");
                

?>


    <div align="center" style="margin: 10px;">
<table border= "2">

<td><a href="director.php">Director Home</a></td>
<td><a href="schedlist.php">Schedule Games</a></td>
<td><a href="seesched.php">See Schedules</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Team Lists</a></td>

</table>
    </div>
</body>
</html>


