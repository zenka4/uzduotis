<?php include __DIR__ . '/dataView.php' ?>

<?php print_r($fileOutput); ?>
<table>
    <tr>
        <?php foreach ($fileOutput[0] as $key => $value) : ?>
            <th><?= $key ?></th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($fileOutput as $value) : ?>
        <tr>
            <th> <?= $value['first_name'] ?></th>
            <th> <?= $value['age'] ?></th>
            <th> <?= $value['gender'] ?></th>
        </tr>
    <?php endforeach ?>
</table>