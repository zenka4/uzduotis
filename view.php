<?php print_r($msg); ?>
<table>
    <tr>
        <?php foreach ($msg[0] as $key => $value) : ?>
            <th><?= $key ?></th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($msg as $value) : ?>
        <tr>
            <?php foreach ($value as $item) : ?>
                <th> <?= $item ?></th>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>