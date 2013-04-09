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
    <title>C$50 Finance: Home</title>
  </head>

  <body>

    <div align="center">
      <a href="index.php"><img alt="C$50 Finance" border="0" height="110" src="images/logo.gif" width="544"/></a>
    </div>

    <div align="center">
           <p> Your Portfolio::</p>
           <img alt="Stock Market" height="331"
                src="http://3.bp.blogspot.com/_azimCSzqNnc/SekmlMaDNWI/AAAAAAAABDc/4bKN6J6zb58/s400/stock_market_crash.jpg"
                
                      width="400" />
    
    </div>
                                                                          
    <div align="center">
        <table border=1> 
             <?
                 $uid = $_SESSION["uid"];
                 $result = mysql_query("SELECT cash FROM users 
                 WHERE uid = $uid");
                  while ($row = mysql_fetch_array($result))
                  {
                    $s = lookup($row["cash"]);
                    print('<tr>');
                    print('<td> cash </td>');
                    print('<td>' . $row["cash"] .  '</td>');
                    print('</tr>');
                  }  
                   
                $result = mysql_query("SELECT symbol FROM Portfolio 
                WHERE uid = $uid");
                while ($row = mysql_fetch_array($result))
                {                               
                    $s = lookup($row["symbol"]);
                    print('<tr>');
                    print('<td> Company </td>');
                    print('<td>' . $row["symbol"] .  '</td>');
                    print('</tr>');
                           
                    
                 }               
             
              $result = mysql_query("SELECT shares FROM Portfolio
                              WHERE uid = $uid");
                      while ($row = mysql_fetch_array($result))
                       {
                      $s = lookup($row["shares"]);
                      print('<tr>');
                      print('<td> Shares </td>');
                      print('<td>' . $row["shares"] .  '</td>');
                      print('</tr>');
                       }
                                                                                                                       
                                                              
             
                     $s = lookup($row["price"]);
                     print('<tr>');
                     print('<td> Price </td>');
                     print('<td>' . $row["price"] .  '</td>');
                     print('</tr>');
             }                                                          
              
                                                                               
                                                                               ?>                                                  
    </div>
     
    <div style="margin: 10px;">
              You can also <a href="quote.php">get a quote </a> or <a 
              href="buy.php"> buy </a> or <a href="sell.php">sell </a> a stock
                      </div>
                      
              
     
    <div align="center" style="margin: 10px;">
      <a href="logout.php">log out</a>
    </div>

  </body>

</html>
