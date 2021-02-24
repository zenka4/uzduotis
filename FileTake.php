<?php

use MyProject\Entity\FileReader;

session_start();
include __DIR__ . '/MyProject/Entity/FileReader.php';
// tikrinam  ar ta uzklausa kurios laukiam
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Show data') {

    // tikrinam ar failas sekmingai uzsikrove
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {

        //failo pilnas vardas
        $fileName = $_FILES['fileToUpload']['name'];


        //laikina direktorija
        $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];

        //is failo vardo atskiriam failo tipa
        $fileType = substr($fileName, strrpos($fileName, '.') + 1);

        // filo tipo visas raides paverciam i mazasias
        $lowerCaseFileType = strtolower($fileType);

        // masyvas su failu tipais kuriuos priimti
        $allowedfileExtensions = array('csv', 'xml', 'json');


        if (in_array($lowerCaseFileType, $allowedfileExtensions)) {

            $fileReader = new FileReader($fileTmpPath, $lowerCaseFileType);
            $fileOutput = $fileReader->readGivenFile();
            $_SESSION['msg'] = $fileOutput;
            header('location:http://localhost/uzduotis/');
            die;
        } else {
            echo 'zopa';
        }
    }
}


/////substr($fileName, strrpos($fileName, '.') + 1); <- paima paskutini taska; ////end(explode(".", $filename));