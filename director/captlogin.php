<?

    // require common code
    require_once("includes/common.php");

    // log out current user (if any)
    session_start();
    session_destroy();

?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>Captain:Login</title>
  </head>

  <body>
     
    <div align="center"> FroshIMs Captain Sign-in
    </div>

    <div align="center">
      <form action="captlogin2.php" method="post">
        <table border="0">
          <tr>
            <td class="field">Team Name:</td>
            <td><input name="username" type="text" /></td>
          </tr>
          <tr>
            <td class="field">Password:</td>
            <td><input name="password" type="password" /></td>
          </tr>
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Log In" />
        </div>
      
      <a href="http://www.hcs.harvard.edu/froshims/captregister.php">Sign-Up</a>
      </form>
    </div>

  </body>

</html>
