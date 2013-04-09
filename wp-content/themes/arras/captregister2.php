<?

    // require common code
    require_once("includes/common.php"); 
  
    // escape username and both passwords for safety
    $firstname = mysql_real_escape_string($_POST["firstname"]);
    $lastname = mysql_real_escape_string($_POST["lastname"]);
$teamSport1= mysql_real_escape_string($_POST["teamSport1"]);
$teamSport2= mysql_real_escape_string($_POST["teamSport2"]);
$teamSport3= mysql_real_escape_string($_POST["teamSport3"]);
$teamSport4= mysql_real_escape_string($_POST["teamSport4"]);
$individualSport1= mysql_real_escape_string($_POST["individualSport1"]);
$individualSport2= mysql_real_escape_string($_POST["individualSport2"]);    
$dorm= mysql_real_escape_string($_POST["Dorm"]);
$entryway= mysql_real_escape_string($_POST["entryway"]);
    $email = mysql_real_escape_string($_POST["Email"]);
    $phone= mysql_real_escape_string($_POST["Phone"]);
	$password1= mysql_real_escape_string($_POST["password1"]);
$password2= mysql_real_escape_string($_POST["password2"]);
$individualSports = array($individualSport1,$individualSport2);
//Set local Variables
$captainName = $firstname." ".$lastname; 
$Iid=0;
$Cid=0;
$empty=0;
$taken=1;
$error1=0;
$error2=0;
$error3=0;
$error4=0;

//Check for BLANK fields
if ($_POST["firstname"] == "" || $_POST["lastname"] == "" ||
    $_POST["Game"] == "blank"||
$_POST["Dorm"]== "blank"||$_POST["Email"] == ""||
    $_POST["Phone"] == ""|| $_POST["password1"] == "" 
|| $_POST["password2"] == "")
    {
         apologize("There are blank fields!");

    }         
// Check that Passwords MATCH
if($password1 != $password2)
{
apologize("Your passwords do not match");
}



         
//Register for team sport 1 
if ($teamSport1!=""){
	//Check to see if Team QUOTA is FULL
		// Search the beta_teamList Database for Tid
		$findTid = mysql_query("SELECT Tid FROM beta_teamList WHERE sport = '$teamSport1' AND dorm = '$dorm' AND taken = '$empty' "); 
		$tidRow = mysql_fetch_array($findTid);
		
			// If Team is available 	
			if ( mysql_num_rows($findTid)!= 0) {
				// Update Team as taken
				$Tid= $tidRow["Tid"];
				mysql_query("UPDATE beta_teamList SET taken='$taken' WHERE Tid='$Tid'");
				// Insert User into Capt_register
				mysql_query("INSERT INTO beta_captRegister (Tid, captFname, captLname, sport, email, phone, password)
				         				VALUES('$Tid','$firstname','$lastname','$teamSport1','$email','$phone','$password1')");
				//Insert User into beat_teams
				$result = mysql_query("SELECT Cid FROM beta_captRegister WHERE email = '$email' AND sport='$teamSport1'"); 
				$row = mysql_fetch_array($result);
				$Cid= $row["Cid"];
				mysql_query("INSERT INTO beta_teams (Cid, dorm, entryway, Tid, sport)
				       					VALUES('$Cid','$dorm','$entryway','$Tid','$teamSport1')");
         		}
			else{
				//Set Error
				$error1=$teamSport1;
			}
}		 
if ($teamSport2!=""){
	//Check to see if Team QUOTA is FULL
		// Search the beta_teamList Database for Tid
		$findTid = mysql_query("SELECT Tid FROM beta_teamList WHERE sport = '$teamSport2' AND dorm = '$dorm' AND taken = '$empty' "); 
		$tidRow = mysql_fetch_array($findTid);
		
			// If Team is available 	
			if ( mysql_num_rows($findTid)!= 0) {
				// Update Team as taken
				$Tid= $tidRow["Tid"];
				mysql_query("UPDATE beta_teamList SET taken='$taken' WHERE Tid='$Tid'");
				// Insert User into beta_captregister
				mysql_query("INSERT INTO beta_captRegister (Tid, captFname, captLname, sport, email, phone, password)
				         				VALUES('$Tid','$firstname','$lastname','$teamSport2','$email','$phone','$password1')");
				//Insert User into beat_teams
				$result = mysql_query("SELECT Cid FROM beta_captRegister WHERE email = '$email' AND sport='$teamSport2'"); 
				$row = mysql_fetch_array($result);
				$Cid= $row["Cid"];
				mysql_query("INSERT INTO beta_teams (Cid, dorm, entryway, Tid, sport)
				       					VALUES('$Cid','$dorm','$entryway','$Tid','$teamSport2')");
         		}
			else{
				//Set Error
				$error2=$teamSport2;
			}
         }
		 if ($teamSport3!=""){
	//Check to see if Team QUOTA is FULL
		// Search the beta_teamList Database for Tid
		$findTid = mysql_query("SELECT Tid FROM beta_teamList WHERE sport = '$teamSport3' AND dorm = '$dorm' AND taken = '$empty' "); 
		$tidRow = mysql_fetch_array($findTid);
		
			// If Team is available 	
			if ( mysql_num_rows($findTid)!= 0) {
				// Update Team as taken
				$Tid= $tidRow["Tid"];
				mysql_query("UPDATE beta_teamList SET taken='$taken' WHERE Tid='$Tid'");
				// Insert User into beta_captregister
				mysql_query("INSERT INTO beta_captRegister (Tid, captFname, captLname, sport, email, phone, password)
				         				VALUES('$Tid','$firstname','$lastname','$teamSport3','$email','$phone','$password1')");
				//Insert User into beta_teams
				$result = mysql_query("SELECT Cid FROM beta_captRegister WHERE email = '$email' AND sport='$teamSport3'"); 
				$row = mysql_fetch_array($result);
				$Cid= $row["Cid"];
				mysql_query("INSERT INTO beta_teams (Cid, dorm, entryway, Tid, sport)
				       					VALUES('$Cid','$dorm','$entryway','$Tid','$teamSport3')");
         		}
			else{
				//Set Error
				$error3=$teamSport3;
			}
         }
		 if ($teamSport4!=""){
	//Check to see if Team QUOTA is FULL
		// Search the beta_teamList Database for Tid
		$findTid = mysql_query("SELECT Tid FROM beta_teamList WHERE sport = '$teamSport4' AND dorm = '$dorm' AND taken = '$empty' "); 
		$tidRow = mysql_fetch_array($findTid);
		
			// If Team is available 	
			if ( mysql_num_rows($findTid)!= 0) {
				// Update Team as taken
				$Tid= $tidRow["Tid"];
				mysql_query("UPDATE beta_teamList SET taken='$taken' WHERE Tid='$Tid'");
				// Insert User into beta_captregister
				mysql_query("INSERT INTO beta_captRegister (Tid, captFname, captLname, sport, email, phone, password)
				         				VALUES('$Tid','$firstname','$lastname','$teamSport4','$email','$phone','$password1')");
				//Insert User into beta_teams
				$result = mysql_query("SELECT Cid FROM beta_captRegister WHERE email = '$email' AND sport='$teamSport4'"); 
				$row = mysql_fetch_array($result);
				$Cid= $row["Cid"];
				mysql_query("INSERT INTO beta_teams (Cid, dorm, entryway, Tid, sport)
				       					VALUES('$Cid','$dorm','$entryway','$Tid','$teamSport4')");
         		}
			else{
				//Set Error
				$error4=$teamSport4;
			}
         }
//Register Player for individual sport
$maxIndivid = 2;		 
if ($individualSport1!="" ||$individualSport2!="" ){
	for($i=0; $i<$maxIndivid; $i++){
		

		if($individualSports[$i] != ""){
		$insert50 = mysql_query("INSERT INTO beta_individual (dorm, fname, lname, email, phone, sport, password)
				 
		VALUES('$dorm','$firstname','$lastname','$email','$phone','$individualSports[$i]','$password1')");
		}
	}
	//Get Iid
	$resultIid = mysql_query("SELECT Iid FROM beta_individual WHERE email = '$email'"); 
				$rowIid = mysql_fetch_array($resultIid);
				$Iid= $rowIid["Iid"];
				
	
}
		 
		 


      // log them in
         redirect("http://www.hcs.harvard.edu/~froshims/?page_id=192&Cid=".$Cid."&Iid=".$Iid."&teamSport1=".$teamSport1."&teamSport2=".$teamSport2."&teamSport3=".$teamSport3."&teamSport4=".$teamSport4."&individualSport1=".$individualSports[0].
         "&individualSport2=".$individualSports[1]."&error1=".$error1."&error2=".$error2."&error3=".$error3."&error4=".$error4);
    

                  
?>
