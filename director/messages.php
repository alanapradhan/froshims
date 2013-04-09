<?
  // Code was adpated from "Learining PHP, MySQL, & JavaScript"
  // by Robin Nixon and the O'Reilly publishing company
  // to fit the purposes of this website                  
    
    require_once("includes/common.php");
    include_once ("showprofile.php");

    // get users information for navigation titles
    $uid = $_SESSION["uid"];
    $query = "SELECT * FROM users WHERE uid ='$uid'";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);

    $firstname=$row[2];
    $lastname=$row[3];

    $user=$firstname.$lastname;
    // allow user to go to
    if (isset($_GET['view'])) 
    {
        $view = mysql_real_escape_string($_GET['view']);
       
        $query = "SELECT * FROM users WHERE uid = $view";
        
        $result = mysql_query($query);
        
        $row = mysql_fetch_row($result);
          
        $firstname= $row[2];
        $lastname= $row[3];
          
        $recip =$firstname.$lastname;
        
    }
    
    else 
    $view = $uid;

    // if a message is posted
    if (isset($_POST['text']))
    {
        $text = mysql_real_escape_string($_POST['text']);

        //if next is not empty insert new message into table
        if ($text != "")
        {
            $pm = substr((mysql_real_escape_string($_POST['pm'])),0,1);
            $time = time();
            $result=mysql_query("INSERT INTO messages(auth,recip,pm,time,message,authuid) 
            VALUES('$user', '$recip', '$pm', '$time', '$text','$uid')");
        }
    }

    if ($view != "")
    {
        // Your is used instead of username if it is user viewing 
        if ($view == $uid)
        {
            $name1 = "Your";
            $name2 = "Your";
        }
        
        // link to sender's message wall
        else
        {
            $name1 = "<div>$recip</div>";
            $name2 = "$recip";
        }

        echo "<h3>$name1 Messages</h3>";
        showProfile($view);
    
        //insertion of html in php
        
        echo "<form method='post' action='messages.php?view=$view'>
        Type here to leave a message (please do not use apostrophes:)<br />";
        echo "<textarea name='text' cols='40' rows='3'></textarea><br />
        Public<input type='radio' name='pm' value='0' checked='checked' />
        Private<input type='radio' name='pm' value='1' />";
        echo"<input type='submit' value='Post Message' /></form>";
        
        
        // only allows erasing of messages by user
        if (isset($_GET['erase']))
        {
            $erase = mysql_real_escape_string($_GET['erase']);
           // delete message from database
            mysql_query("DELETE FROM messages WHERE id=$erase AND recip='$user'");
        }

        // display the member's message wall
        $query = "SELECT * FROM messages WHERE recip='$recip' ORDER BY time DESC";
        
        $result = mysql_query($query);
        // display the number of messages found
        $num = mysql_num_rows($result);
        for ($j = 0 ; $j < $num ; ++$j)
        {
            $row = mysql_fetch_row($result);

            //allow all to view public messages
            if ($row[3] == 0 ||
            $row[1] == $user ||
            $row[2] == $user)
            {
                //display date using the date 
                //function to read database time entry
                echo date('M jS \'y g:ia:', $row[4]);
                echo " <a href='messages.php?";
                //allow user to jump to the auth message wall
                echo "view=$row[6]'>$row[1]</a> ";
                    
                //output of public messages
                if ($row[3] == 0)
                {
                    echo "wrote: &quot;$row[5]&quot; ";
                    
                }
                // different txt for private messages
                // only allow auth and recip to view 
                else
                {
                    echo "whispered: <i><fontcolor='#006600'>&quot;$row[5]&quot;</font></i> ";
                }
                
                //if recip is the user then allow them to erase 
                //messages from wall
                if ($row[2] == $user)
                {
                    echo "<a href='messages.php?view=$view";
                    echo "&erase=$row[0]'>erase</a>";
                }
                echo "<br>";
            }
        }
    }

    //if query returns null
    if (!$num) 
    echo "<li>No messages yet</li><br />";
    
    // post navigation options
    echo "<br><a href='messages.php?view=$view'>Refresh messages</a>";
    echo " | <a href='friends.php?view=$view'>View $name2 friends</a>";
    echo " | <a href='index.php'>View Your Profile</a>";

?>


