<?php

use MyProject\Entity\FileReader;

if (isset($_GET['File_Select'])) {
    echo '<pre>';
    // print_r(readGivenFile($_GET['File_Select']));

    print_r((new FileReader($_GET['File_Select']))->readGivenFile());
}
