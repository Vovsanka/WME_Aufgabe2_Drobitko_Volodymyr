<?php
class WorldDataParser
{
    public function parseCSV($path)
    {
        if (($fileStream = fopen($path, "r")) !== FALSE) {
            if (($headers = fgetcsv($fileStream, 0, ",")) == FALSE) {
                throw new Exception("ERROR: can not parse table headers!");
            }
            $columnCount = sizeof($headers);
            $table = array();
            while (($data = fgetcsv($fileStream, 0, ",")) !== FALSE) {
                $tableRow = array_fill_keys($headers, 0);
                for ($i = 0; $i < $columnCount; $i++) {
                    $tableRow[$headers[$i]] = $data[$i];
                }
                array_push($table, $tableRow);
            }
            return $table;
        } else {
            throw new Exception("ERROR: CSV file has not been opened!");
        }

    }
}

?>