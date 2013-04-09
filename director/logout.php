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
    <title>ForshIMs: Log Out</title>
  </head>

  <body>

    <div align="center">
      TTFN
      <br /><br />
     <a href="index.php">Go to Home page</a>
    </div>

  </body>

</html>
