<?

    // require common code
    require_once("includes/common.php"); 
    
    // escape username and both passwords for safety
/*
    $g1 = mysql_real_escape_string($_POST["g1"]);
    $d1 = mysql_real_escape_string($_POST["d1"]);
$team11= mysql_real_escape_string($_POST["team11"]);    
$team21= mysql_real_escape_string($_POST["team21"]);
    $l1 = mysql_real_escape_string($_POST["l1"]);
    $t1= mysql_real_escape_string($_POST["t1"]);

$g2 = mysql_real_escape_string($_POST["g2"]);              
    $d2 = mysql_real_escape_string($_POST["d2"]);            
$team12= mysql_real_escape_string($_POST["team12"]);
$team22= mysql_real_escape_string($_POST["team22"]);
    $l2 = mysql_real_escape_string($_POST["l2"]);      
    $t2= mysql_real_escape_string($_POST["t2"]);      

$g3 = mysql_real_escape_string($_POST["g3"]);              
    $d3 = mysql_real_escape_string($_POST["d3"]);            
$team13= mysql_real_escape_string($_POST["team13"]);
$team23= mysql_real_escape_string($_POST["team23"]);
    $l3 = mysql_real_escape_string($_POST["l3"]);      
    $t3= mysql_real_escape_string($_POST["t3"]);

      $g4 = mysql_real_escape_string($_POST["g4"]);              
    $d4 = mysql_real_escape_string($_POST["d4"]);            
$team14= mysql_real_escape_string($_POST["team14"]);
$team24= mysql_real_escape_string($_POST["team24"]);
    $l4 = mysql_real_escape_string($_POST["l4"]);      
    $t4= mysql_real_escape_string($_POST["t4"]);      

$g5 = mysql_real_escape_string($_POST["g5"]);              
    $d5 = mysql_real_escape_string($_POST["d5"]);            
$team15= mysql_real_escape_string($_POST["team15"]);
$team25= mysql_real_escape_string($_POST["team25"]);
    $l5 = mysql_real_escape_string($_POST["l5"]);      
    $t5= mysql_real_escape_string($_POST["t5"]);     

 $g6 = mysql_real_escape_string($_POST["g6"]);              
    $d6 = mysql_real_escape_string($_POST["d6"]);            
$team16= mysql_real_escape_string($_POST["team16"]);
$team26= mysql_real_escape_string($_POST["team26"]);
    $l6 = mysql_real_escape_string($_POST["l6"]);      
    $t6= mysql_real_escape_string($_POST["t6"]); 

     $g7 = mysql_real_escape_string($_POST["g7"]);              
    $d7 = mysql_real_escape_string($_POST["d7"]);            
$team17= mysql_real_escape_string($_POST["team17"]);
$team27= mysql_real_escape_string($_POST["team27"]);
    $l7 = mysql_real_escape_string($_POST["l7"]);      
    $t7= mysql_real_escape_string($_POST["t7"]); 

     $g8 = mysql_real_escape_string($_POST["g8"]);              
    $d8 = mysql_real_escape_string($_POST["d8"]);            
$team18= mysql_real_escape_string($_POST["team18"]);
$team28= mysql_real_escape_string($_POST["team28"]);
    $l8 = mysql_real_escape_string($_POST["l8"]);      
    $t8= mysql_real_escape_string($_POST["t8"]);  

    $g9 = mysql_real_escape_string($_POST["g9"]);              
    $d9 = mysql_real_escape_string($_POST["d9"]);            
$team19= mysql_real_escape_string($_POST["team19"]);
$team29= mysql_real_escape_string($_POST["team29"]);
    $l9 = mysql_real_escape_string($_POST["l9"]);      
    $t9= mysql_real_escape_string($_POST["t9"]); 

     $g10 = mysql_real_escape_string($_POST["g10"]);              
    $d10 = mysql_real_escape_string($_POST["d10"]);            
$team110= mysql_real_escape_string($_POST["team110"]);
$team210= mysql_real_escape_string($_POST["team210"]);
    $l10 = mysql_real_escape_string($_POST["l10"]);      
    $t10= mysql_real_escape_string($_POST["t10"]);  

    $g11 = mysql_real_escape_string($_POST["g11"]);              
    $d11 = mysql_real_escape_string($_POST["d11"]);            
$team111= mysql_real_escape_string($_POST["team111"]);
$team211= mysql_real_escape_string($_POST["team211"]);
    $l11 = mysql_real_escape_string($_POST["l11"]);      
    $t11= mysql_real_escape_string($_POST["t11"]);      
*/

    /* if either field is empty or password doesn't matche password2 
        if ($_POST["firstname"] == "" || $_POST["lastname"] == "" || 
    $_POST["Game"] == "blank"|| 
$_POST["Dorm"]== "blank"||$_POST["Email"] == ""||
    $_POST["Phone"] == "")
    {
         apologize("There are blank fields!");
        
    }
*/
/*
   
    else
         {
         //check if username already exists
         //$result = mysql_query("SELECT username FROM users WHERE username = 
'$username'");        
         
         //if(mysql_num_rows($result)!=0)
           // apologize("Username already exists!");
*/         
         //if not insert into the user into the user table and give him 10,000 to start 
$g = mysql_real_escape_string($_POST["g1"]);

for($i=1; $i < 12 ;$i++)
{ 
    $d = mysql_real_escape_string($_POST["d".$i]);
$team1= mysql_real_escape_string($_POST["team1".$i]);
$team2= mysql_real_escape_string($_POST["team2".$i]);
    $l = mysql_real_escape_string($_POST["l".$i]);
    $t= mysql_real_escape_string($_POST["t".$i]); 
   $w= mysql_real_escape_string($_POST["w"]);
if($d!="")
{
         $result = mysql_query("INSERT INTO schedule (Game,Date, 
Time,Team1,Team2,Location,Week)
         
VALUES('$g','$d','$t','$team1','$team2','$l','$w')");
}
else
{
break;
}
}         
         // inorder to keep track of the surrent user and his transactions
         //$_SESSION["uid"] = mysql_insert_id();
         
         // log them in
         redirect("director.php");
//         }

                  
?>
