<?php
session_start();
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if (isset($_SESSION['err'])) {
    $err = $_SESSION['err'];
    unset($_SESSION['err']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./MyProject/css/index.css">
    <title>Uzduotis</title>
</head>

<body>
    <div class="form">
        <form enctype="multipart/form-data" action="FileTake.php" method="post">

            <span>Select data file to upload:</span>
            <input type="file" name="fileToUpload">

            <input type="submit" value="Show data" name="uploadBtn">
        </form>
    </div>
    <div class="err"><?= $err ?? '' ?></div>
    <div class="table"><?php if (isset($msg)) {
                            include __DIR__ . '/view.php';
                        } ?></div>


</body>

</html>