<?php

require_once('world_data_parser.php');

$parser = new WorldDataParser();

echo "<pre>\n";
print_r($parser->parseCSV("./world_data_v3.csv"));
echo "</pre>\n";

?>