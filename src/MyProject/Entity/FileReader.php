<?php

namespace MyProject\Entity;

class FileReader
{
    private $fileName;

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Reads entire file into a string, Takes a JSON encoded string and converts it into a PHP variable
     * @return array;
     */
    function jsonIntoArray()
    {
        $data = json_decode(file_get_contents($this->fileName), 1);

        return $data;
    }


    function xmlIntoArray()
    {

        $objXmlDocument = simplexml_load_file($this->fileName);
        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument, 1);

        return $arrOutput['item'];
    }

    function csvIntoArray()
    {
        $csv = array_map('str_getcsv', file($this->fileName));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        return $csv;
    }

    function readGivenFile()
    {

        if ($this->fileName == 'data.xml') {
            _d($this->fileName);
            return $this->xmlIntoArray();
        } elseif ($this->fileName == 'data.json') {
            return $this->jsonIntoArray();
        } elseif ($this->fileName == 'data.csv') {
            return $this->csvIntoArray();
        } else {
            return 'check  file name';
        }
    }
}
