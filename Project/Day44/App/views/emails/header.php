<ul id="menu_list">
    <li><a href="/">Home</a></li>
     <?php if (!logged()) : ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/user/create">Create</a></li>
     <?php endif; ?>
</ul>

<div id="status_login">
    Bem vindo,
    <?php if (logged()) : ?>
        <?php if (user()->path) : ?>
            <img src="/<?php echo user()->path ?>" class="rounded-circle" width="50" height="40">
        <?php endif; ?>

            <?php echo user()->firstName; ?> | <a href="/logout">Logout</a> |
        <a href="/user/edit/profile">Edit profile</a>
    <?php else : ?>
            visitante
    <?php endif; ?>
</div>