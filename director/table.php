<?php

   print('<table cellpadding="5px" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
align="center" >');

        



$result = mysql_query("SELECT Game,Date,Time,Team1,Team2,Location  

FROM schedule WHERE gid = 922");   

                    print('<td> Game </td>');

                    print('<td> Date </td>');

                    print('<td> Time </td>');

                    print('<td> Team 1 </td>');

                    print('<td> Team 2</td>');

                    print('<td> Location </td>');







                  while ($row = mysql_fetch_array($result))

                  {
$date= $row["Date"];
$time=$row["Time"];
$date = date('d M', strtotime($date));
$time = date('g:i a', strtotime($time));

print('<tr>');

print('<td>' . $row["Game"] .  '</td>');

print('<td>' .$date.  '</td>');

print('<td>' .$time.  '</td>');

print('<td>' . $row["Team1"] .  '</td>');

print('<td>' . $row["Team2"] .  '</td>');

print('<td>' . $row["Location"] .  '</td>');

print('</tr>'); 



                  }



print('</table>');

?>    

