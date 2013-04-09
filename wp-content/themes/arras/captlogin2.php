<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $email = mysql_real_escape_string($_GET["email"]);
    $password = mysql_real_escape_string($_GET["password"]);
	//$email= urldecode($email);
    // prepare SQL
    $sql = "SELECT Cid FROM beta_captRegister WHERE email='$email' AND password='$password'";
	//$sql = "SELECT Cid FROM beta_captRegister WHERE email='$email'";

    // execute query
    $result = mysql_query($sql);

    // if we found a row, remember user and redirect to portfolio
    if (mysql_num_rows($result) != 0)
    {
        // grab row
        $row = mysql_fetch_array($result);

session_start( );        
// cache uid in session
        $_SESSION["uid"] = $row["Cid"];


        // redirect to portfolio
        redirect("http://www.hcs.harvard.edu/~froshims/?page_id=200");
    }

    
    // else check if Individual
	else
    
    {
  	$sqlIndiv = "SELECT Iid FROM beta_individual WHERE email='$email' AND password='$password'";
	$resultIndiv = mysql_query($sqlIndiv);
	if (mysql_num_rows($resultIndiv) != 0)
    {
        // grab row
        $row = mysql_fetch_array($resultIndiv);

session_start( );        
// cache uid in session
        $_SESSION["Iid"] = $row["Iid"];


        // redirect to portfolio
        redirect("http://www.hcs.harvard.edu/~froshims/?page_id=200");
    }
	
	else
		apologize("Wrong Username and Password Combination. Please check the email sent at registration to verify your account settings");

                  }




?>
