<ul class="main-menu">
    <li class="project-folders-v-active" <?= $userAuth->isAuthorized() ? 'hidden' : '' ?>>
        <a
            href="/index.php?login=yes">Авторизация</a>
    </li>
    <li class="project-folders-v-active" <?= $userAuth->isAuthorized() ? '' : 'hidden' ?>>
        <a
            href="/index.php?logout=yes">Выйти</a>
    </li>
</ul>
