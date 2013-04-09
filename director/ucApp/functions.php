<?php
    
    // require common code
    require_once("includes/common.php"); 
  
    
    function generateBtnText () {
    	$randomNumber_btn = generateRandomNumber_btn();
	$result = mysql_query('SELECT * FROM ucApp_btnText WHERE sid='.$randomNumber_btn) or die ("unable to connect btn");
                                $row_btn = mysql_fetch_array($result);
				$btn_text= mysql_real_escape_string($row_btn['btn_text']);
				$btn_text = stripslashes($btn_text);
                              
                                return $btn_text;	
		
		
    }
    function displayRandomizedText () {
  
		$randomNumber = generateRandomNumber();
		$text = getMessage($randomNumber);
                
		echo '<h2 class="content">' .$text. '</h2>';
			}
    	
	function generateRandomNumber (){
			
				$randomNumber= rand(1,36);
				return $randomNumber;
				
			}
	function generateRandomNumber_btn (){
			
				$randomNumber= rand(1,6);
				return $randomNumber;
				
			}
	function getMessage ($randomNumber) {
			// get text from database
				
				$result = mysql_query('SELECT text FROM ucApp WHERE tid='.$randomNumber) or die ("unable to connect text");
				$row = mysql_fetch_array($result);
				$text= mysql_real_escape_string($row['text']);
                               
				$text = stripslashes($text);
                               
                                return $text;
			}
			
			
			
		
		
    
	
?>