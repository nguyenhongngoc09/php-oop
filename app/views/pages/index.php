<?php
$titlePage = $data['title'];
$users = $data['users'] ?? [];
?>

<div>
    <h1><?= $titlePage ?></h1>

    <?php if (count($users) > 0) :?>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li> User: <?= $user->user_name ?> --- Email: <?= $user->user_email ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <div>No user found</div>
    <?php endif?>
</div>
