<?

    // require common code
    require_once("includes/common.php"); 
    
    // escape username and both passwords for safety
    $Game = mysql_real_escape_string($_POST["Game"]);
    $Date = mysql_real_escape_string($_POST["Date"]);
    $Time = mysql_real_escape_string($_POST["Time"]);
    $Team1 = mysql_real_escape_string($_POST["Team1"]); 
    $Team2 = mysql_real_escape_string($_POST["Team2"]);
    $Location = mysql_real_escape_string($_POST["Location"]);
    //$lat = mysql_real_escape_string($_POST["lat"]);
    //$lng = mysql_real_escape_string($_POST["lng"]);
    //$address = mysql_real_escape_string($_POST["address"]);   

    // if either field is empty or password doesn't matche password2 
        if ($_POST["Date"] == "" || $_POST["Time"] == "" || 
    $_POST["Team1"] == ""|| $_POST["Team2"] == ""||
    $_POST["Location"] == ""||
    $_POST["Game"] == "")
    {
         apologize("There are blank fields!");
        
    }

   
    else
         {
         //check if username already exists
        // $result = mysql_query("SELECT username FROM users WHERE username = 
//'$username'");        
         
         //if(mysql_num_rows($result)!=0)
           // apologize("Username already exists!");
         
         //Insert Event into database 
         $result = mysql_query("INSERT INTO schedule 
(Game,Date,Time,Team1,Team2,Location)
         VALUES('$Game','$Date','$Time','$Team1','$Team2','$Location')");
         
         // inorder to keep track of the surrent user and his transactions
         //$_SESSION["uid"] = mysql_insert_id();
         
         // log them in
         redirect("index.php");
         }

                  
?>
