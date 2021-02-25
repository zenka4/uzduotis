<?php

use MyProject\Entity\FileReader;

include __DIR__ . '/MyProject/Entity/FileReader.php';
class App
{

    /**
     * cheks or valid request and file upload correctly if OK ,summon another function
     */
    public static function upload()
    {

        // tikrinam ar validi uzklausa

        if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Show data') {

            // tikrinam ar failas sekmingai uzsikrove
            if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {

                //failo pilnas vardas
                $fileName = $_FILES['fileToUpload']['name'];
                //is failo vardo atskiriam failo tipa
                $fileType = substr($fileName, strrpos($fileName, '.') + 1);

                // filo tipo visas raides paverciam i mazasias
                $lowerCaseFileType = strtolower($fileType);

                // masyvas su failu tipais kuriuos priimti
                $allowedfileExtensions = array('csv', 'xml', 'json');


                // tikrinam ar failas atitinka musu skaitomu failu formata
                if (in_array($lowerCaseFileType, $allowedfileExtensions)) {

                    self::readGivenFile($lowerCaseFileType);
                }
                $_SESSION['err'] = 'Bad extension ,file type';
                self::redirect();
            }
            $_SESSION['err'] = 'Something wrong with file';
            self::redirect();
        }
        $_SESSION['err'] = 'File not upload';
        self::redirect();
    }


    /**
     * just redirect to home page
     */
    public static function redirect()
    {
        header('location:http://localhost/probuju/');
        die;
    }

    /***
     *check which file type we get, invite FileReader , write data to sesion and redirect
     */
    public static function  readGivenFile($lowerCaseFileType)
    {

        //laikina direktorija
        $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];

        $fileReader = new FileReader($fileTmpPath);

        if ($lowerCaseFileType == 'xml') {

            $fileOutput = $fileReader->xmlIntoArray();

            $_SESSION['msg'] = $fileOutput;

            self::redirect();
        } elseif ($lowerCaseFileType == 'json') {
            $fileOutput = $fileReader->jsonIntoArray();
            $_SESSION['msg'] = $fileOutput;
            self::redirect();
        } elseif ($lowerCaseFileType == 'csv') {
            $fileOutput = $fileReader->csvIntoArray();
            $_SESSION['msg'] = $fileOutput;
            self::redirect();
        } else {
            return 'check  file type';
        }
    }
}
