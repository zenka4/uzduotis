<?php
// include __DIR__ . '/function.php';
include __DIR__ . '/src/MyProject/Entity/FileReader.php';
include __DIR__ . '/dataView.php';
// session_start();
// _d($_GET['File_Select']);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $_SESSION['msg'] = $_POST['File_Select'];
//     if ($_POST['File_Select'] == "data.json") {
//         // _dd($_POST['File_Select']);
//         header('Location: http://localhost/uzduotis/');
//         exit;
//     }
// }

// if (isset($_SESSION['msg'])) {
//     $msg = $_SESSION['msg'];
//     unset($_SESSION['msg']);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzduotis</title>
</head>

<body>
    <form action="" method="get">
        <select name="File_Select" id="">
            <option value="0">select file type</option>
            <option value="data.json">JSON</option>
            <option value="data.xml">XML</option>
            <option value="data.csv">CSV</option>
        </select>

        <button type="submit">Read</button>
    </form>

    <?php if (isset($_GET['File_Select']) && ($_GET['File_Select'] != '0')) {
        include __DIR__ . '/view.php';
    } ?>
</body>

</html>