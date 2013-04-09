<?

    // require common code
    require_once("includes/common.php"); 
    
    // escape username and both passwords for safety
    $firstname = mysql_real_escape_string($_POST["firstname"]);
    $lastname = mysql_real_escape_string($_POST["lastname"]);
$Game= mysql_real_escape_string($_POST["Game"]);    
$Dorm= mysql_real_escape_string($_POST["Dorm"]);
    $Email = mysql_real_escape_string($_POST["Email"]);
    $Phone= mysql_real_escape_string($_POST["Phone"]);
    //$lng = mysql_real_escape_string($_POST["lng"]);
    //$address = mysql_real_escape_string($_POST["address"]);   

    // if either field is empty or password doesn't matche password2 
        if ($_POST["firstname"] == "" || $_POST["lastname"] == "" || 
    $_POST["Game"] == "blank"|| 
$_POST["Dorm"]== "blank"||$_POST["Email"] == ""||
    $_POST["Phone"] == "")
    {
         apologize("There are blank fields!");
        
    }
/*
   
    else
         {
         //check if username already exists
         //$result = mysql_query("SELECT username FROM users WHERE username = 
'$username'");        
         
         //if(mysql_num_rows($result)!=0)
           // apologize("Username already exists!");
*/         
         //if not insert into the user into the user table and give him 10,000 to start 
         $result = mysql_query("INSERT INTO pingpong (Game, Dorm, 
Fname,Lname,Email,Phone)
         VALUES('$Game','$Dorm','$firstname','$lastname','$Email','$Phone')");
         
         // inorder to keep track of the surrent user and his transactions
         //$_SESSION["uid"] = mysql_insert_id();
         
         // log them in
         redirect("index.php");
//         }

                  
?>
