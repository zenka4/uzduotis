<?php include __DIR__ . '/dataView.php' ?>
<div style="display:inline-block">first name</div>
<div style="display:inline-block">age</div>
<div style="display:inline-block">gender</div>
<?php foreach ($fileOutput as $value) : ?>
    <div>
        <div style="display:inline-block"><?= $value['first_name'] ?></div>
        <div style="display:inline-block"><?= $value['age'] ?></div>
        <div style="display:inline-block"><?= $value['gender'] ?></div>
    </div>
<?php endforeach ?>