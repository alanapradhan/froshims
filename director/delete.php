<?

    // require common code
    require_once("includes/common.php");


?>



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

                         <html xmlns="http://www.w3.org/1999/xhtml">

                                 <body>
<table cellpadding="0" cellspacing="0" style="width:590px;" bgcolor="#FFFFFF" 
border="2" b$
align="center" >
<?
if (isset($_GET['delete']))
                {
                    $delete = mysql_real_escape_string($_GET['delete']);

                    // Select the info of the friend user wants to add
                    $result = mysql_query("DELETE * FROM schedule WHERE gid =
'$delete'");
redirect(seesched2.php);
}
