<?php
   //require_once("includes/common.php");
    $uid=23;
	$gid = 1;
    $captain = new team_captain($uid);
	$captain->showProperty($captain->fName);
	$opponent = $captain->findOpponent($gid);
	
	 
	class team_captain {
		public $cid, $tid, $fName, $lName, $email, $phone, $password;
		
		function __construct($uid){
			$mysqli = new mysqli("mysql.hcs.harvard.edu", "froshims", "vodkafest10", "froshims");
			
			if ($mysqli->connect_errno) {
    			printf("Connect failed: %s\n", $mysqli->connect_error);
    			exit();
			}
			
			$res = $mysqli->query("SELECT * FROM registration WHERE cid='$uid'");
			
			if ($row = $res->fetch_assoc()) {
				foreach ($row as $key => $value){
					$this->$key = $value;
					
					//Print_r($key ." = ". $this->$key);
				}
				return $this->cid;
		
			}
			
			
		}
		
		public function showProperty($property){
			echo "The property is: ".$property;
			echo "The tid is: ". $this->tid;
		}
		
		public function findOpponent($gid){
			$mysqli = new mysqli("mysql.hcs.harvard.edu", "froshims", "vodkafest10", "froshims");
			
			if ($mysqli->connect_errno) {
    			printf("Connect failed: %s\n", $mysqli->connect_error);
    			exit();
			}
			$res = $mysqli->query("SELECT team1, team2 FROM schedule WHERE team1='$this->tid' OR team2 = '$this->tid'");
			if ($row = $res->fetch_assoc()) {
				$team1 = $row["team1"];
				$team2 = $row["team2"];
			if ($team1 != $this->tid){
				$opponent = $team1;
			}
			else{
				$opponent =$team2;
			}
			return $opponent;
			}
		}
		
		public function sendEmail($email, $type = "greeting"){
			//send email to captian depending on type of email
		}
		public function sendEmail_toOpp($oppEmail, $type = "fCheck") {
			//send email to opp
		}
		public function createCapt_list(){
			//generate table wit the list of cpatians and info for the captain's sport
		}
		public function createSchedule(){
			//generate table with the list of game past and pending w/ scores reported
		}
	}
	
	class schedule {
		public $gid, $sport, $type, $time, $date, $team1, $team2, $location;
		
		function __construct ($gid) {
			$mysqli = new mysqli("mysql.hcs.harvard.edu", "froshims", "vodkafest10", "froshims");
			
			if ($mysqli->connect_errno) {
    			printf("Connect failed: %s\n", $mysqli->connect_error);
    			exit();
			}
			
			$res = $mysqli->query("SELECT * FROM schedule WHERE gid='$gid'");
			
			if ($row = $res->fetch_assoc()) {
				foreach ($row as $key => $value){
					$this->$key = $value;
					
					//Print_r($key ." = ". $this->$key);
				}
			}
		}
		 public function createTable($sport){
		 		//generate table with the sport's schedule ORDER BY Date ** hopefully use google visualizations
		 	
		 	
		 }
	}	
?>