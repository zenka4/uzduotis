<?php

namespace MyProject\Entity;

class FileReader
{
    private $fileName;

    /**
     * create obj with temporary directory name, file type
     * @return object
     */
    function __construct($fileName)
    {
        $this->fileName = $fileName; //  <=laikina direktorija
    }

    /**
     * Reads JSON entire file into a string, Takes a JSON encoded string and converts it into a PHP variable
     * @return array;
     */
    function jsonIntoArray()
    {
        $data = json_decode(file_get_contents($this->fileName), 1);

        return $data;
    }

    /**
     * Reads XML entire file, and converts it into a PHP variable
     * @return array;
     */
    function xmlIntoArray()
    {

        $objXmlDocument = simplexml_load_file($this->fileName);
        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument, 1);

        return $arrOutput['item'];
    }


    /**
     * Read csv
     * @return array;
     */
    function csvIntoArray()
    {
        $csv = array_map('str_getcsv', file($this->fileName));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        return $csv;
    }
}
