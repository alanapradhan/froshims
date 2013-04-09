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

                // if the friend's uid is being passed recursively
                if (isset($_GET['view2']))
                {
                    // set view2 to frienduid
                    $view2 = mysql_real_escape_string($_GET['view2']);
                    
                    // Select friend's name
                    $user = mysql_query("SELECT * FROM users WHERE uid='$view2'");
                    $row = mysql_fetch_assoc($user);
                    $name = $row["firstname"];    
                    
                    // Display fried's profile 
                    $name = "$name's";
                                    
                    echo "<h3> $name Page</h3>";
                    
                    //show their profile
                    showProfile($view2);
                    echo "<a href='messages.php?view=$view2'>$name Messages</a><br />";
                    echo "<a href='/~apradhan/mash/friendsmap.php?view=$view2'>See my Map</a><br />";
                    die("<a href='index.php'>My Profile</a><br />");
                    
                }
                                                    
                 
                 // if the friend's uid is passed from messages.php
                 if(isset($_GET['view']))
                 {
                    $view = mysql_real_escape_string($_GET['view']);
                    
                    // Read in friend's friend list
                    $result = mysql_query("SELECT * FROM friends WHERE uid = '$view'");
                    
                    // If no rows are selected:            
                    if(mysql_num_rows($result)==0)
                     {
                        echo " <div style='margin: 10px;' align= 'center'> T
                        his person currently has no freinds </div>";
                     }
                    
                    // populate friend's list
                    else
                     {
                        // Select friend's name for output
                        $result3= mysql_query("SELECT * FROM users WHERE uid = '$view'");
                        $row3= mysql_fetch_array($result3);
                        $friendname= $row3["firstname"].$row3["lastname"];
                        
                        //output list title
                        echo " <div style='margin: 10px;' align= 'center'>
                        <b>".$friendname."'s Friends:</b></div>";
                        
                        //iterate over friends
                        while ($row = mysql_fetch_array($result))
                           {
                                $currentuid = $row["frienduid"];
                                $currentname = $row["firstname"].$row["lastname"];
                                
                                // store uid to be passed if current friend's friend
                                //is not a friend of the user
                                $add=$row["frienduid"];                                   
                                
                                //Determine relation of friend's friend to user
                                $result2 = mysql_query("SELECT * FROM friends WHERE
                                frienduid = '$currentuid'AND uid = '$uid'");
                                
                                // if a friend allow user to view thier page 
                                if (mysql_num_rows($result2)!=0)                                                        
                                 {   
                                    echo " <div style='margin: 10px;' align= 'center'>View:
                                    <a href='friends.php?view2=" . $currentuid . "'>
                                    ". $currentname . "</a></div>";
                                 }         
                                
                                // if the friend is the user 
                                else if($uid==$currentuid)
                                 {
                                    echo " <div style='margin: 10px;' align= 'center'>Me</div>";                                        
                                 }
                                
                                // if friend is not a friend of the user allow user to add friend
                                else                                
                                 {
                                     // remove whitespace from url
                                     $trim= str_replace (" ", "","/~apradhan/RidesHome/search2.php?add=$add" );
                                     
                                     echo " <div style='margin: 10px;' align= 'center'>
                                     Add:<a href='$trim'>$currentname</a><br /></div>";
                                 }
                           }
                      }               
                 }
                 
                 
                 if(!isset($_GET['view']))
                 {
                 $result = mysql_query("SELECT * FROM friends WHERE uid = '$uid'");
                               
                  
                        while ($row = mysql_fetch_array($result))
                    {                               
                        $currentuid = $row["frienduid"];
                        $currentname = $row["firstname"]. $row["lastname"];
                    
                        $result2 = mysql_query("SELECT * FROM friends WHERE
                        frienduid = '$currentuid'AND uid = '$uid'");
                    
                        echo " <div style='margin: 10px;' align= 'center'>
                        <a href='friends.php?view2=" . $currentuid . "'>
                        ". $currentname . "</a></div>";        
                 }      
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
