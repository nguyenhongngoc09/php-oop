<?php
require APP_ROOT ."/views/includes/head.php";
?>

<div class="navbar dark">
    <?php require APP_ROOT.'/views/includes/navigation.php';?>
</div>

<div class="container">
    <?php if (isLoggedIn()) :?>
        <a class="btn green" href="<?php echo URL_ROOT ?>/posts/create">Create</a>
    <?php endif; ?>
    <?php foreach($data as $post) :?>
        <div class="container-item">
            <h2><?php echo $post->title?></h2>
            <h3><?php echo "Created at: " . date('F j h:m', strtotime($post->created_at))?></h3>
            <p><?php echo $post->content?></p>
        </div>
    <?php endforeach; ?>
</div>