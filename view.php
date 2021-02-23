<?php print_r($msg); ?>
<table>
    <tr>
        <?php foreach ($msg[0] as $key => $value) : ?>
            <th><?= $key ?></th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($msg as $value) : ?>
        <tr>
            <th> <?= $value['first_name'] ?></th>
            <th> <?= $value['age'] ?></th>
            <th> <?= $value['gender'] ?></th>
        </tr>
    <?php endforeach ?>
</table>