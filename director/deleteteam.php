<?

    // require common code
    require_once("includes/common.php"); 
    
    // escape username and both passwords for safety

         //if not insert into the user into the user table and give him 10,000 to start 
$delete = mysql_real_escape_string($_GET['delete']);
$GameType =  mysql_real_escape_string($_GET['game']);
                    // Select the info of the friend user wants to add
              

      $result = mysql_query("DELETE FROM beta_captRegister WHERE Cid =
$delete");
                    //$row = mysql_fetch_array($result);
echo "<tr>The entry has been deleted!</tr>";
echo "<tr><a href='teamlist2.php?game=" . $GameType . "'>Click Here to Continue Editing</a></tr>";
                  
?>
