<ul class="main-menu">
    <li class="project-folders-v-active" <?= (isset($_GET['login']) && $_GET['login'] == 'yes' || isset($authorized) && $authorized) ? 'hidden' : '' ?>>
        <a
            href="/index.php?login=yes">Авторизация</a>
    </li>
    <li class="project-folders-v-active" <?= isset($authorized) && $authorized ? '' : 'hidden' ?>>
        <a
            href="/index.php?login=yes">Выйти</a>
    </li>
</ul>