<nav class="top-nav">
    <ul>
        <li><a href="<?= URL_ROOT ?>/pages">Home</a></li>
        <li><a href="<?= URL_ROOT ?>/pages/about">About</a></li>
        <li><a href="<?= URL_ROOT ?>/pages/projects">Projects</a></li>
        <li><a href="<?= URL_ROOT ?>/posts">Blog</a></li>
        <li><a href="<?= URL_ROOT ?>/pages/contact">Contact</a></li>
        <li class="btn-login">
            <?php if (isLoggedIn()) : ?>
                <a href="<?= URL_ROOT ?>/users/logout">Logout</a>
            <?php else : ?>
                <a href="<?= URL_ROOT ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>