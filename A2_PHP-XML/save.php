<?php

require_once('world_data_parser.php');

$parser = new WorldDataParser();

$dataArray = $parser->parseCSV("./world_data_v3.csv");
$successXML = $parser->saveXML($dataArray);

echo "<h2> XML save status: ";
if ($successXML == TRUE) {
    echo "success (1)";
} else {
    echo "failure (0)";
}
echo "</h2>";

?>