<?
include_once 'simple_html_dom.php';
ini_set('memory_limit', '-1');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        $html = new simple_html_dom();
        $file_path = 'https://www.commonapp.org/CommonApp/MemberRequirements.aspx';
        //load a file
        
        $html->load_file($file_path);
        //get table
        $single = $html->find('tr',5);
      
        echo $single->innertext;
        //memory clear
        $html->clear();
        
        
        ?>
    </body>
</html>
