<?php

   print('<div><table cellpadding="5px" cellspacing="0" bgcolor="#FFFFFF" border="2" bordercolor="#782911" 
align="center" >');

        



$result=mysql_query("SELECT * FROM dorm_FinalSatndings order by Total DESC");   

                    print('<td> Dorm </td>');

                    print('<td> Total </td>');

                   







                  while ($row = mysql_fetch_array($result))

                  {
$dorm= $row["Dorm"];
$total=$row["Total"];

print('<tr>');

print('<td>' .$dorm.  '</td>');

print('<td>' .$total.  '</td>');

print('</tr>'); 



                  }



print('</table></div>')

?>    

