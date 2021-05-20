<?php require APP_ROOT.'/views/includes/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT.'/views/includes/navigation.php';?>
</div>
<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

        <form action="<?= URL_ROOT ?>/users/register" method="POST">
            <input type="text" placeholder="Username*" name="username"/>
            <span class="invalidFeedback">
                <?php echo $data['usernameError']?>
            </span>

            <input type="text" placeholder="Email*" name="email"/>
            <span class="invalidFeedback">
                <?php echo $data['emailError']?>
            </span>

            <input type="password" placeholder="Password*" name="password"/>
            <span class="invalidFeedback">
                <?php echo $data['passwordError']?>
            </span>

            <input type="password" placeholder="Password Confirm*" name="confirmPassword"/>
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>
            <p class="options">
                Not register yet? <a href="<?= URL_ROOT?>/users/register">Create an account</a>
            </p>
        </form>
    </div>
</div>