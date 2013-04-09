<?

    // require common code
    require_once("includes/common.php"); 

    // escape username and password for safety
    $symbol = mysql_real_escape_string($_POST["symbol"]);
    $numshare = mysql_real_escape_string($_POST["numshare"]);

    $uid = $_SESSION["uid"];
    
    
    
    
    
     
     
     // inputs left empty  
           if ($_POST["symbol"] == "" || $_POST["numshare"] == "" )
                     {
             apologize("Invalid username and/or password!");
                              
               
                                  }
             //if (!preg_match("/^\d+$/", $_POST["numshare"])  
               
               //apologize("Invalid username and/or password!");
                    
               
             else
           {
                   
                  
                  $sql = "INSERT INTO Portfolio (uid,symbol,shares)
                             VALUES('$uid','$symbol','$numshare')";
                  
                  $result = mysql_query($sql);  
                  
          ON DUPLICATE KEY UPDATE numshare = numshare+VALUES(shares)
                  
                  $result = mysql_query($sql);                   

                  
                  
                  $s = lookup($symbol);

                  $cost = ($numshare* $s->price);
               $sql = "SELECT cash FROM users WHERE uid = $uid ";
                                                        
                 $user = mysql_query($sql);
                 
                  $userrow = mysql_fetch_assoc($user);  

                   
                   if($userrow["cash"] < $cost)
                            
                   apologize("you dont have enough money");
                   
                                     
                  else
                  {
                  $sql = "INSERT INTO History (uid, bought,shares,price)
                        VALUES('$uid','$symbol','$numshare','$cost')";
                  
                  $result = mysql_query($sql);
          $sql = "UPDATE users SET cash=(cash-$cost) WHERE uid ='%d',$uid"; 
                 $result = mysql_query($sql);
                  }
                                              
                                                                                                    
                                 
          }
                                                                             
                                                     
                                                     
                                                     
                                                     
                    //  SELECT * FROM tbl WHERE uid=2
    
    //SELECT uid,symbol,shares FROM tbl WHERE uid=2
    //SELECT shares FROM tbl WHERE uid=2 AND symbol='HXPN.PK'                                                                                     


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
               
                         <html xmlns="http://www.w3.org/1999/xhtml">
                         
                                 <body>
                                         <div style="margin: 10px;">
                                                          
                                                              <a 
                            href="index.php">return to your portfolio</a>
                                                  </div>
                                                             
                                                       </body>
                                                     </html>
                                                                    
