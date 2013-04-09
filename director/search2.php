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
    <title>RidesHome: Search</title>
  </head>

  <body>

                                                                      
    <div align="center">
        <table border=1> 
             <?
                 
                $uid = $_SESSION["uid"];
                
                // allow user to view friend
                if (isset($_GET['view']))
                {
                    // set view to frienduid
                    $view = mysql_real_escape_string($_GET['view']);
                    
                    // Select friend's name
                    $user = mysql_query("SELECT * FROM users WHERE uid='$view'");
                    $row = mysql_fetch_assoc($user);
                    $name = $row["firstname"];    
                    
                    //If friend's uid matches user's uid
                    if ($view == $uid) 
                    {
                        $name = "Your";
                        echo "<h3> $name Page</h3>";
                        showProfile($view);
                        die("<a href='index.php'>My Profile</a><br />");
                    }
                    // View friend's freind profile
                    else 
                    {    
                        $name = "$name's";
                                    
                        echo "<h3> $name Page</h3>";

                        //show their profile
                        showProfile($view);
                    
                        echo "<a href='messages.php?view=$view'>$name Messages</a><br />";
                        echo "<a href='/~apradhan/mash/friendsmap.php?view=$view'>See my Map</a><br />";
                        die("<a href='index.php'>My Profile</a><br />");
                    }
                }
                // allow user to add a friend                                   
                if (isset($_GET['add']))
                {
                    
                    $add = mysql_real_escape_string($_GET['add']);
                    
                    // prevent user from adding themself as a friend
                    if($add!=$uid)
                    {
                        // Select the info of the friend user wants to add 
                        $result = mysql_query("SELECT * FROM users WHERE uid = '$add'");
                        $row = mysql_fetch_array($result);
                    
                        //assign variables for insertion
                        $firstname = $row["firstname"];
                        $lastname=$row["lastname"];
                        $lat=$row["lat"];
                        $lng=$row["lng"];
                        $name=$row["firstname"].$row["lastname"];
                        $currentuid=$row["uid"];
                    
                        // Insert new friend
                        $result2 = mysql_query("INSERT INTO friends 
                        (uid, frienduid,firstname,lastname,lat,lng) 
                        VALUES('$uid', '$add', ' $firstname','$lastname','$lat',' $lng')");
                     
                        echo "<div style='margin: 10px;' align= 'center'>You Are Now Friends With:</div>";
                    
                        // can now view friend's page 
                        echo " <div style='margin: 10px;' align= 'center'>View:
                        <a href='search2.php?view=".$currentuid."'>". $name . "</a></div>";
                                 
                    }    
                    // prevent user from adding themself
                    else if($add==$uid)
                    {
                        echo " <div style='margin: 10px;' align= 'center'>
                        You cannot add yourself as a friend, but:</a></div>";
                                                
                        echo " <a href='search2.php?view=" . $uid . "'>
                        Would you like to see your profile? </a>";
                    }   
                }
                                                                                   
                // if query is sent from search.php
                if (isset($_GET['name']))
                 {
                    // assign variable to query
                    $query = mysql_real_escape_string($_GET["name"]);
                    $query = preg_replace('/\s\s+/', ' ', $query);        
                 
                    // Find members that match the query
                    $result = mysql_query("SELECT * FROM users WHERE 
                    username = '$query' OR firstname = '$query' OR lastname = '$query'");
                
                    // Populate list of results
                    while ($row = mysql_fetch_array($result))
                    {                               
                        // Assign variables
                        $currentuid = $row["uid"];
                        $currentname = $row["firstname"].$row["lastname"];
                    
                        //Determine relation of friend's friend to user
                        $result2 = mysql_query("SELECT * FROM friends WHERE
                        frienduid = '$currentuid'AND uid = '$uid'");
                    
                        // if a friend allow user to view thier page
                        if(mysql_num_rows($result2)!=0)
                        {   
                            echo " <div style='margin: 10px;' align= 'center'>View: 
                            <a href='search2.php?view=" . $currentuid . "'>
                            ". $currentname . "</a></div>";
                        }   
                    
                        // if friend is not a friend of the user allow user to add friend
                        else
                        {   
                            echo "<div style='margin: 10px;' align= 'center'>Add: 
                            <a href='search2.php?add=" . $currentuid . "'>
                            ". $currentname . "</a></div>";        
                        }
                    }      
                 }      
        ?>                                                  
    </table>
    
     
        <div style="margin: 10px;" align= "center">
         <a href="search.php"> Search for Another Member </a>
        </div>
                      
        <div style="margin: 10px;" align= "center">
          <a href="index.php"> Profile </a>
        </div>
                                                      
     
    
    </div>

  </body>

</html>
