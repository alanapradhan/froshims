<?
require_once("includes/common.php");

?>
<form action="editsched3.php" method="post" name="editsched">
 <table cellspacing="0">
  <caption>
   Schedule a Game 
  </caption>
  <tr>
<th scope="col">Game Type</th>    
<th scope="col">Date</th>
   <th scope="col">Time</th>
   <th scope="col">Team 1</th>
   <th scope="col">Team 2</th>
  <th scope="col">Location</th> 
</tr>
  <tr>
   <th scope="row"><select name="g1">
<option value="blank">Select Game Type</option>
  <option value="Pingpong">Pingpong</option>
  <option value="Frisbee">Ultimate Frisbee</option>
  <option value="Flag Football">Flag Football</option>
  <option value="Soccer">Soccer</option>
</select></th>
   <td><select name="m1">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option> 
<option value="06">6</option> 
<option value="07">7</option> 
<option value="08">8</option>                   
<option value="09">9</option>                   
<option value="10">10</option>                   
<option value="11">11</option>    
<option value="12">12</option> 
<option value="13">13</option> 
<option value="14">14</option>
<option value="15">15</option>                   
<option value="16">16</option>                   
<option value="17">17</option>                   
<option value="18">18</option>    
<option value="19">19</option> 
<option value="20">20</option> 
<option value="21">21</option>
<option value="22">22</option>                   
<option value="23">23</option>                   
<option value="24">24</option>                   
<option value="25">25</option>    
<option value="26">26</option> 
<option value="27">27</option> 
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
					<td>
<select name="t1">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
<td>
<?
//$game=mysql_real_escape_string($_REQUEST['game']);
$game= "Flag Football";
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options=""; 

while ($row=mysql_fetch_array($result)) { 

    $TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"]; 
//    $thing=$row["thing"]; 
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName; 
} 
?> 

<SELECT NAME=team11> 
<OPTION VALUE=0>Choose 
<?=$options?> 
</SELECT>

</td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team21>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT>
</td>
<td><input type="text" name="l1"/></td>
</tr>
<tr>
<th></th>
<td><select name="m2">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d2">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t2">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
                                        <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team12>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT>
</td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team22>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l2"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m3">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d3">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>                                     
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t3">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
   <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team13>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team23>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l3"/></td>
  </tr><tr>
   <th scope="row">
</th>
<td><select name="m4">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d4">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t4">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
                                        <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team14>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team24>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l4"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m5">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d5">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t5">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
                                        <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team15>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team25>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l5"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m6">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d6">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>   
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t6">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>
                                     <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team16>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team26>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l6"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m7">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d7">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t7">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>                                    

    <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team17>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team27>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l7"/></td>
  </tr><tr>
   <th scope="row">
</th>
<td><select name="m8">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d8">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t8">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>     

                                   <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team18>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team28>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l8"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m9">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d9">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t9">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>     

                                   <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team19>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team29>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l9"/></td>
  </tr><tr>
   <th scope="row"></th>
<td><select name="m10">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d10">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t10">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>     

                                   <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team110>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team210>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l10"/></td>
  </tr><tr>
   <th scope="row">
</th>
<td><select name="m11">
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="d11">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
                                        <td>
<select name="t11">
<option value="10:00:00">10:00</option>
<option value="10:30:00">10:30</option>
<option value="11:00:00">11:00</option>
<option value="11:30:00">11:30</option>
<option value="12:00:00">12:00</option>
<option value="12:30:00">12:30</option>
<option value="13:00:00">13:00</option>
<option value="13:30:00">13:30</option>
<option value="14:00:00">14:00</option>
<option value="14:30:00">14:30</option>
<option value="15:00:00">15:00</option>
<option value="15:30:00">15:30</option>
<option value="16:00:00">16:00</option>
<option value="16:30:00">16:30</option>
<option value="17:00:00">17:00</option>
<option value="17:30:00">17:30</option>
<option value="18:00:00">18:00</option>
<option value="18:30:00">18:30</option>
<option value="19:00:00">19:00</option>
<option value="19:30:00">19:30</option>
<option value="20:00:00">20:00</option>
</select>

</td>     

                                   <td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team111>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><?
$result = mysql_query("SELECT * FROM captain Where Game = '$game'");

$options="";

while ($row=mysql_fetch_array($result)) {

$TeamName = $row["TeamName"] . "-" . $row["Fname"] . " " . $row["Lname"];
//    $thing=$row["thing"];
    $options.="<OPTION VALUE=\"$TeamName\">".$TeamName;
}
?>

<SELECT NAME=team211>  
<OPTION VALUE=0>Choose
<?=$options?>
</SELECT></td>
<td><input type="text" name="l11"/></td>
  </tr>
 </table>
 <input type="submit" class="save" value="Save" />
</form>
 <div align="center" style="margin: 10px;">
<table border= "2">

<form enctype="multipart/form-data" action="uploader.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>


<td><a href="director.php"> Director Home</a></td>
<td><a href="report.php">Report Win/Foreit</a></td>
<td><a href="teamlist.php">Team Lists</a></td>

</table>
    </div>

