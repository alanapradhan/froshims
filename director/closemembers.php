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
    <title>RidesHome: Close Members</title>
  </head>

  <body>

                                                                      
    <div align="center">
        <table border=1> 
             <?
                 
                $uid = $_SESSION["uid"];

                // if the friend's uid is being passed recursively
                if (isset($_GET['view']))
                {
                    // set view2 to frienduid
                    $view = mysql_real_escape_string($_GET['view']);
                    
                    // Select friend's name
                    $user = mysql_query("SELECT * FROM users WHERE uid='$view'");
                    $row = mysql_fetch_assoc($user);
                    $name = $row["firstname"];    
                    $name = "$name's";
                                    
                    // Display fried's profile
                    echo "<h3> $name Page</h3>";
                    
                    showProfile($view);
                    echo "<a href='messages.php?view=$view'>$name Messages</a><br />";
                    echo "<a href='/~apradhan/mash/friendsmap.php?view=$view'>See my Map</a><br />";
                    die("<a href='index.php'>My Profile</a><br />");
                }
                                                    
                // allow user to add a friend
                if (isset($_GET['add']))
                {
                    $add = mysql_real_escape_string($_GET['add']);
                    
                    // Select the info of the friend user wants to add
                    $result = mysql_query("SELECT * FROM users WHERE uid = '$add'");
                    $row = mysql_fetch_array($result);
                    
                    //assign variables for insertion
                    $firstname = $row["firstname"];
                    $lastname=$row["lastname"];
                    $lat=$row["lat"];
                    $lng=$row["lng"];
                    
                    // Insert new friend
                    $result2 = mysql_query("INSERT INTO friends (uid, frienduid,firstname,lastname,lat,lng) 
                    VALUES('$uid', '$add', ' $firstname','$lastname','$lat',' $lng')");
                    echo "<tr>Friend has been Added!</tr>";    
                    
                }
                                                                                   
                
                 // Select current user's info                              
                 $result = mysql_query("SELECT uid,lat,lng FROM users WHERE
                 uid='$uid'");
                 $row = mysql_fetch_array($result);
                 
                 //store in variables for next database query
                 $currentuser = $row["uid"];
                 $userlat = $row["lat"];
                 $userlng = $row["lng"];
                 
                 //set radius of proximity search
                 $limit=1;
                 
                 //save eq to enable listing of members by proximty
                 $eq=(sqrt(pow(('$userlat'-lat),2))+(pow(('$userlng'-lng),2)));
                  
                 // Select members close to user
                 $result = mysql_query("SELECT * FROM users 
                 WHERE (sqrt(pow(('$userlat'-lat),2))+(pow(('$userlng'-lng),2)))<= '$limit'
                 AND `uid` != '$uid'  
                 ORDER BY '$eq'  DESC");
                
                 if(mysql_num_rows($result)==0)
                 { 
                    echo " <div style='margin: 10px;' align= 'center'>
                    No current members live relatively close to you</div>";
                 }                    
                
                 // if results are returned populate list
                 else               
                 {
                    while ($row = mysql_fetch_array($result))
                    {                               
                        $currentuid = $row["uid"];
                        $currentname = $row["firstname"]. $row["lastname"];
                        
                        // chech relation to user
                        $result2 = mysql_query("SELECT * FROM friends WHERE
                        frienduid = '$currentuid'AND uid = '$uid'");
                                
                        // if already a friend allow them to view profile
                        if(mysql_num_rows($result2)!=0 )
                        {
                            echo "  <div style='margin: 10px;' align= 'center'>
                            View: <a href='closemembers.php?view=" . $currentuid . "'>
                            ". $currentname . "</a><div/>";
                        }
                       // else allow them to add the friend
                        else
                        {                        
                            echo " <div style='margin: 10px;' align= 'center'>
                            Add: <a href='closemembers.php?add=" . $currentuid . "'>
                            ". $currentname . "</a></div>";        
                        }
                    }      
                 }                
                        
            ?>                                                  
    </table>
    </div>
     
              
     
    <div align="center" style="margin: 10px;">
     <a href="index.php">Profile</a>
    </div>
           
  </body>

</html>
