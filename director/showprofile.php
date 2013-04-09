<?
function showProfile($user)
{
     
     // Select the correct status to be outputed                           
     $result = mysql_query("SELECT * FROM profiles WHERE uid='$user'");
     $row = mysql_fetch_row($result);
     echo "<br>Status:<br />". stripslashes($row[1]) . "<br clear=left /><br />";
           
}
?>
                                                        
