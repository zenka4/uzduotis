<?php print_r($fileOutput ?? '') ?>
<?php foreach ($fileOutput as $value) : ?>
    <div><?= $value['first_name'] ?></div>
    <div><?= $value['age'] ?></div>
    <div><?= $value['gender'] ?></div>
<?php endforeach ?>