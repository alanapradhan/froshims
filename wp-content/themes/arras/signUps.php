<?php

   

        


/*
$count=mysql_query("SELECT sport, COUNT(taken)
					FROM beta_teamList WHERE taken=0");
					   
					$row = mysql_fetch_array($count);
					//echo "There are only". $row['COUNT(taken)'] ." teams left.";
	
 
 */				print('<div style="height:300px;width:650px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;"><table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
					align="center" >');

                    print('<td> Dorm </td>');

                    print('<td> Sport </td>');

                    print('<td> Instance </td>');
$result=mysql_query("SELECT *
					FROM beta_teamList WHERE taken=0 
					ORDER BY dorm, sport, instance ASC");
                





                  while ($row = mysql_fetch_array($result))

                  {
                  	
$dorm= $row["dorm"];
$sport=$row["sport"];
$instance=$row["instance"];

print('<tr>');

print('<td>' . $dorm .  '</td>');

print('<td>' .$sport.  '</td>');

print('<td>' .$instance.  '</td>');

				  }



print('</table></div>')

?>    

