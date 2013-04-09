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
    <div align="center"> FroshIMs: Schedule a Game</div>
  </head>

  <body>


    
    <div align="center">
      <form action="addevent2.php" method="post" name="registration">
        
        
        <table border="0">
<tr>
            <td>Game Type:</td>
            <td><input name="Game" type="text" /></td>
          </tr>
          <tr>

          <tr>
            <td>Date:</td>
            <td><input name="Date" type="text" /></td>
          </tr>
          <tr>
            <td>Time:</td>
            <td><input name="Time" type="text" /></td>
          </tr>
                                            
          <tr>
          //<input type="hidden" value="<?php echo $_GET[id]; ?>" name="lat">  
          //<input type="hidden" value="<?php echo $_GET[id2]; ?>" name="lng">
          //<input type="hidden" value="<?php echo $_GET[id2]; ?>" name="address">
          </tr>
          
          <tr>
<td class="field">Team1:</td>
            //<td><input name="Team1" type="text" /></td>
          </tr>
          
          <tr>
            <td class="field">Team2:</td>
            <td><input name="Team2" type="text" /></td>
            <td class="field">Location:</td>
            <td><input name="Location" type="text" /></td>
         </tr>
        
        </table>
        
        <div style="margin: 10px;">
          <input type="submit" value="Schedule" />
        </div>
      </form>
    </div>

  </body>

</html>
