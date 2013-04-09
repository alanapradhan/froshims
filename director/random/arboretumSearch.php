<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <!--search form: return to self-->
        <form name="search" action= "<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <div> 
                Search: <input type="text" name="q"></input>
                <select name ="searchField">
                    <option value ="ScientificName">Scientific Name</option>
                    <option value ="SourceAccessionNumber">Accession Number</option>
                    <option value ="AbbreviatedName">Abbreviate Name</option>
                    <option value ="PrimaryCommonName">Common Name</option>
                </select>

                <input type="submit" value="Submit"></input>
            </div>
        </form>

        <?php
        //check if query was sent
        if (isset($_GET['q'])) {
            //check if you have curl loaded
            if (!function_exists("curl_init"))
                die("cURL extension is not installed");
            $text = urlencode(trim($_GET['q']));

            $field = $_GET['searchField'];

            //$url = 'http://map.arboretum.harvard.edu/ArcGIS/rest/services/CollectionResearcher/Plants/MapServer/3/query?f=json&where=UPPER('.$field.')%20LIKE%20UPPER('.$text.')&returnGeometry=true&spatialRel=esriSpatialRelIntersects&outFields=*&callback=dojo.io.script.jsonp_dojoIoScript18._jsonpCallback';
            //$url = 'http://map.arboretum.harvard.edu/ArcGIS/rest/services/CollectionResearcher/Plants/MapServer/find?searchText=' . $text . '&contains=true&searchFields=' . $field . '&sr=&layers=0,1,2,3&layerdefs=&returnGeometry=true&maxAllowableOffset=&f=pjson';
           
         
         
        //$url_init='http://map.arboretum.harvard.edu/ArcGIS/rest/services/CollectionResearcher/Plants/MapServer/3/query?f=json&where='    
        $url = "http://map.arboretum.harvard.edu/ArcGIS/rest/services/CollectionResearcher/Plants/MapServer/3/query?text=&geometry=&geometryType=esriGeometryPoint&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&objectIds=&where=UPPER%28".$field."%29+LIKE+UPPER%28%27".$text."%27%29&time=&returnCountOnly=false&returnIdsOnly=false&returnGeometry=true&maxAllowableOffset=&outSR=&outFields=*&f=pjson";
           
            $ch = curl_init($url);
            // Configuring curl options
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json'));
            curl_setopt_array($ch, $options);
            $response = curl_exec($ch);
            curl_close($ch);


            //decode json responseinto associative array
            $result_a = json_decode($response, true);
          $resultCount = count($result_a["features"]);
          echo "Your search found " . $resultCount . " results. <br />";
         // echo '<pre>'; print_r($result_a); '</pre>';
         // echo '<pre>'; print_r($url); '</pre>';
            
            
            
          
//result is not null print results
            if ($resultCount > 0) {

                //parse through associative array
                $arr = $result_a["features"];
                $i = 0;

                print('<table border = "1" width="1800px">');
                //table headings
                print('<tr>');
                print('<th>Result</th>');
                foreach ($arr[0]["attributes"] as $key => $value) {

                    print('<th>' . $key . '</th>');
                }

                print('</tr>');
                // fill in table with results
                while ($i < $resultCount) {
                    print('<tr>');
                    $j = $i + 1;
                    print('<td>' . $j . '</td>');
                    foreach ($arr[$i]["attributes"] as $key => $value) {
                        //if("Accession Number"== $key)
                        print('<td>' . $value . '</td>');
                    }
                    $i++;
                    print('</tr>');
                }
                print('</table>');
            }
             
        }




