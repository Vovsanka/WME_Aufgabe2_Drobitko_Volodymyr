<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World data</title>
</head>

<body>
    <?php

    /*
    prints the status of XML generation (requires WorldDataParser)
    */

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

</body>

</html>