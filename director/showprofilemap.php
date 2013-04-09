<?

    // require common code
    require_once("includes/common.php"); 
    include_once ("showprofile.php");
?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>RidesHome: Friends</title>
  </head>

  <body>


                                                                      
    <div align="center">
        <table border=1> 
             <?
                 
                
                $uid = $_SESSION["uid"];

                // view friends profile from map
                if (isset($_GET['view']))
                {
                    $view = mysql_real_escape_string($_GET['view']);
                    
                    $user = mysql_query("SELECT * FROM users WHERE uid='$view'");
                    $row = mysql_fetch_assoc($user);
                    $name = $row["firstname"]. $row["lastname"];    
                    if ($view == $uid) 
                        $name = "Your";
                    else 
                        $name = "$name's";
                                    
                    echo "<h3> $name Page</h3>";
                    
                    showProfile($view);
                    echo "<a href='messages.php?view=$view'>$name Messages</a><br />";
                    echo "<a href='/~apradhan/mash/friendsmap.php?view=$view'>See my Map</a><br />";
                    die("<a href='index.php'>My Profile</a><br />");
                }
                                                    
                
?>                                                  
    </table>
    </div>
     
    <div style="margin: 10px;" align= "center">
     <a href="index.php"> Profile </a>
    </div>
                      
              
     
    <div align="center" style="margin: 10px;">
      <a href="logout.php">log out</a>
    </div>

  </body>

</html>
