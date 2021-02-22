<?php

use MyProject\Entity\FileReader;

if (isset($_GET['File_Select'])) {

    // print_r(readGivenFile($_GET['File_Select']));

    $FileReader = new FileReader($_GET['File_Select']);
    $fileOutput = $FileReader->readGivenFile();

    return $fileOutput;
}
