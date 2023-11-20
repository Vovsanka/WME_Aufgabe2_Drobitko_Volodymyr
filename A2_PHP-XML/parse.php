<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

    require_once('world_data_parser.php');

    $parser = new WorldDataParser();

    echo "<pre>\n";
    print_r($parser->parseCSV("./world_data_v3.csv"));
    echo "</pre>\n";

    ?>

</body>

</html>