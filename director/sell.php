<?

    // require common code
    require_once("includes/common.php");



?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>C$50 Finance: Sell</title>
  </head>

  <body>

    <div align="center">
      <a href="index.php"><img alt="C$50 Finance" border="0" src="images/logo.gif" /></a>
    </div>

    <div align="center">
      <form action="sell2.php" method="post">
        <table border="0">
          <td> What would you like to sell?</td>
     <?  
       
       $uid = $_SESSION["uid"];
       $result = mysql_query("SELECT symbol FROM Portfolio
       WHERE uid = $uid");                    
       while ($row = mysql_fetch_array($result))
       {
           $i=1;
           $id;
           $s = lookup($row["symbol"]);
           print('<tr>');
          echo ('<td><INPUT TYPE=hidden NAME=symboltosell VALUE=' . $row["symbol"] . 
          '> </input> <a href=onclick=sell2.php>'
           . $row["symbol"] . </a>";
           
           
           print('</tr>');
            $i++;
       }
                                                                      
      
      ?>
        </table>
        <div style="margin: 10px;">
          </>
        </div>
        
      
      
      </form>
    </div>

  </body>

</html>
