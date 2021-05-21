<?php
require APP_ROOT ."/views/includes/head.php";
?>

<div class="navbar dark">
    <?php require APP_ROOT.'/views/includes/navigation.php';?>
</div>

<div class="container center">
    <h1>Create new post</h1>

    <form action="<?php URL_ROOT?>/posts/create" method="POST">
        <div class="form-item">
            <input type="text" name="title" placeholder="Title...">
            <span class="invalidFeedback">
                <?php echo $data['titleError']?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="content" placeholder="Your content..."></textarea>
            <span class="invalidFeedback">
                <?php echo $data['contentError']?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>