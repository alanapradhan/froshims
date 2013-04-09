<?

    // require common code
    require_once("includes/common.php"); 

    // escape oldpassword and newpassword for safety
    $oldpassword = mysql_real_escape_string($_POST["password"]);
    $password = mysql_real_escape_string($_POST["password2"]);
    // get the users input
    $oldpassword = $_POST["password"];
    $newpassword = $_POST["password2"];
   
    $uid = $_SESSION["uid"];
    // read in the users old password 
    $sql = "SELECT password FROM users WHERE password='$oldpassword' AND uid = '$uid'";
    $user = mysql_query($sql);
    $userrow = mysql_fetch_assoc($user);
   

    // if the fields are empty or the inputed old password and the logged old password
    //differ prevent change
    if ($_POST["password2"] == ""|| $_POST["password"]== "" || 
    $userrow["password"]!=$oldpassword)
    {
         
         apologize("Invalid input");
        
    }

   
    else
         {
        // replace old password with new password in user table
        $sql = " UPDATE users SET password = '$newpassword' WHERE uid ='$uid'";
        mysql_query($sql);
        redirect("index.php");
         }

                  
?>
