<?php
class WorldDataParser
{
    /*
    contains some methods for processing of a world_data csv, xml and html table
    */
    public function parseCSV($path)
    {
        /*
        parser a world data_csv
        parameters:
            $path: path to a csv file
        return value: array containing the parsed data
        */
        if (($fileStream = fopen($path, "r")) !== FALSE) {
            if (($headers = fgetcsv($fileStream, 0, ",")) == FALSE) { // read the first csv line to the headers array
                throw new Exception("ERROR: can not parse table headers!");
            }
            $columnCount = sizeof($headers); // a constant for index limitation
            $table = array(); // init an empty table array
            while (($data = fgetcsv($fileStream, 0, ",")) !== FALSE) { // read the next row 
                $tableRow = array_fill_keys($headers, 0); // init array with headers as keys
                for ($i = 0; $i < $columnCount; $i++) { // iterate through headers indices
                    $tableRow[$headers[$i]] = $data[$i]; // write data[i] to table with key headers[i]
                }
                array_push($table, $tableRow); // push table row with headers keys
            }
            fclose($fileStream);
            return $table; // return the calculated table (array)
        } else {
            throw new Exception("ERROR: CSV file has not been opened!");
        }

    }

    public function saveXML($dataArray)
    {
        /*
        generates and writes XML to "world_data.xml" in the same folder
        parameters:
            $dataArray: data array (such as the result of parseCSV())
        return value: TRUE if write successfull, FALSE otherwise
        */
        try {
            $xmlString = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
            $xmlString .= "<Countries>\n"; // root element Countries
            foreach ($dataArray as $row) {
                $xmlString .= "\t<Country>\n"; // each row corresponds a Country
                foreach ($row as $header => $tableEntry) {
                    $headerXMLTag = explode(" ", $header)[0]; // take the first header word as the header tag 
                    $xmlString .= "\t\t<" . strval($headerXMLTag) . ">"; // open the header tag
                    $xmlString .= trim(strval($tableEntry)); // insert the table entry without space around
                    $xmlString .= "</" . strval($headerXMLTag) . ">\n";  // close the header tag
                }
                $xmlString .= "\t</Country>\n";
            }
            $xmlString .= "</Countries>\n";

            $fileStream = fopen("./world_data.xml", "w");
            fwrite($fileStream, $xmlString); // write the xmlString to the file
            fclose($fileStream);
            return TRUE; // is reached only if no errors have occured
        } catch (Exception $e) {
            return FALSE; // false if an error occured
        }
    }

    public function printXML($pathXML, $pathXSL)
    {
        /*
        generates HTML from XML using XSL
        parameters:
            $pathXML: path to an xml file
            $pathXSL: path to an xsl file
        return value: html string
        */

        // Load the XML source
        $xml = new DOMDocument;
        $xml->load($pathXML);

        // Load the XSL stylesheet
        $xsl = new DOMDocument;
        $xsl->load($pathXSL);

        // Configure the transformer
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl); // attach the xsl rules

        return $proc->transformToXML($xml);
    }

}

?>