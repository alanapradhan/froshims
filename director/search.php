<?

    // require common code
    require_once("includes/common.php");

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
      <form action="search2.php" method="get">
        <table border="0">
          <tr>
            <td class="field">Search (please only enter either their first or lastname):</td>
            <td><input name="name" type="text" /></td>
          </tr>
          
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Search" />
        </div>
        <div style="margin: 10px;">
          or <a href="index.php">Profile</a> 
        </div>
      
      
      </form>
    </div>

  </body>

</html>
