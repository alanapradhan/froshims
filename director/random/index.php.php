     <?php
$url = "http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=YahooDemo&query=apocalipto";
$result = file_get_contents($url);
echo $result;
?>
