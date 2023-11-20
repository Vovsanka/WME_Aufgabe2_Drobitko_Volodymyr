<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <script type="module" src="../main.js"></script>
    <link rel="shortcut icon" href="#">
    <title>World data</title>
    <meta name="description" content="Web engineering student project">
    <meta name="author" content="Volodymyr Drobitko 4970111">
    <meta name="keywords" content="HTML, CSS, vanilla JS">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li class="nav-item" id="main-logo">
                    <a href="">
                        <img src="../assets/img/world_data-logo.svg" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../index.html" target="_blank">
                        <img src="../assets/img/table.svg" alt="">
                        <span>A1 - Table</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../A2_PHP-XML/parse.php" target="_blank">
                        <img src="../assets/img/cogs.svg" alt="">
                        <span>A2 - Parse</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../A2_PHP-XML/save.php" target="_blank">
                        <img src="../assets/img/save.svg" alt="">
                        <span>A2 - Save</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../A2_PHP-XML/print.php" target="_blank">
                        <img src="../assets/img/print.svg" alt="">
                        <span>A2 - Print</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank">
                        <img src="../assets/img/nodejs.svg" alt="">
                        <span>A3 - REST</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank">
                        <img src="../assets/img/map.svg" alt="">
                        <span>A4 - Vis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank">
                        <img src="../assets/img/cube.svg" alt="">
                        <span>A5 - 3D</span>
                    </a>
                </li>
                <li class="nav-item" id="menu">
                    <a>
                        <img src="../assets/img/burger.svg" alt="Menu">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>World Data Overview ...</h1>
        <div class="text-section">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet.
            from:
            <a href="https://www.loremipsum.de/">www.loremipsum.de</a>
        </div>
        <div class="data">
            <!-- <table class="data__table" id="data-table"> -->
            <?php

            require_once('world_data_parser.php');

            $parser = new WorldDataParser();

            $dataArray = $parser->parseCSV("./world_data_v3.csv");
            $successXML = $parser->saveXML($dataArray);

            if ($successXML == TRUE) {
                echo $parser->printXML("./world_data.xml", "./world_data.xsl");
            } else {
                echo "ERROR: Couldn't generate XML";
            }

            ?>
            <!-- </table> -->
        </div>
    </main>
    <footer>
        <div class="footer__details--left">
            <p>Copyright @ 2023 world_data</p>
            <p>First course exercise
                <b>HTML, CSS and JS</b>
                of the lecture Web and Multimedia Engineering
            </p>
        </div>
        <div class="footer__details--right">
            <p>This solution has been created by:</p>
            <p>Volodymyr Drobitko</p>
        </div>
    </footer>
</body>

</html>