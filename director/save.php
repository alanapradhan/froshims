                    
                    



<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          
          <html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?          
    
    // get the coordinates from try.html
    $address= ($_GET["id3"]);
    $lat = ($_GET["id"]);
    $lng = ( $_GET["id2"]);
    
    // Output table of results for confirmation
    print('<tr>');
    print('<td width= 250>This is the Address I would like to use:</td>');
    print('</tr>');
    
    print('<table width= 600>');
    
    print('<tr>');
    print('<td width=100><b>My Address: </b></td>');    
    print( '<td>'.$address. '</td>');
    print('</tr>');
    
    print('<tr>');
    print('<td  width=100><b>Latitude: </b></td>');
    print('<td>'.$lat.'</td>');
    print('</tr>');
    
    print('<tr>');
    print('<td  width=100><b>Longitude: </b></td>');
    print('<td>'.$lng.'</td>');
    print('</tr>');
    
    print('<tr>');                                                                        
    print( '<td> <a href=" register.php?id='.$lat.'&id2='.$lng.'&id3='.$address.'"> Confirm </a></td>');
    print('</tr>');
    
    print('</table>');
    
    print('<tr>');
    print( '<td> <a href="try.html"> Enter A Different Address </a></td>');
    print('</tr>');

?>
</body>
</html>                         
