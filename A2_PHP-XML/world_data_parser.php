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
            fclose($fileStream);
            return $table;
        } else {
            throw new Exception("ERROR: CSV file has not been opened!");
        }

    }

    public function saveXML($dataArray)
    {
        try {
            $xmlString = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
            $xmlString .= "<Countries>\n";
            foreach ($dataArray as $row) {
                $xmlString .= "\t<Country>\n";
                foreach ($row as $header => $tableEntry) {
                    $headerXMLTag = explode(" ", $header)[0];
                    $xmlString .= "\t\t<" . strval($headerXMLTag) . ">";
                    $xmlString .= trim(strval($tableEntry));
                    $xmlString .= "</" . strval($headerXMLTag) . ">\n";
                }
                $xmlString .= "\t</Country>\n";
            }
            $xmlString .= "</Countries>\n";

            $fileStream = fopen("./world_data.xml", "w");
            fwrite($fileStream, $xmlString);
            fclose($fileStream);
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

}

?>