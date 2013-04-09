<?

    // require common code
    require_once("includes/common.php");


?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>RidesHome: PASSWORD</title>
  </head>

  <body>

    <div align="center">
      <form action="password2.php" method="post">
        <table border="0">
         
          <tr>
            <td class="field">Previous Password:</td>
            <td><input name="password" type="password" /></td>
            <td class="field">New Password:</td>
            <td><input name="password2" type="password" /></td>
                      
          </tr>
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Change Password" />
        </div>
        <div style="margin: 10px;">
          or <a href="login.php">login</a> to your account
        </div>
      </form>
    </div>

  </body>

</html>
