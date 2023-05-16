<?php
require_once __DIR__ . '/data/users.php';
require_once __DIR__ . '/data/passwords.php';
require_once __DIR__ . '/data/core.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>

<body>

<div class="header">
    <div class="logo"><img src="i/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Ходько С. П.</span></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <li><a href="index.php">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
        <li class="project-folders-v-active" <?= (isset($_GET['login']) && $_GET['login'] == 'yes' || isset($authorized) && $authorized) ? 'hidden' : '' ?>>
            <a
                href="?login=yes">Авторизация</a>
        </li>
        <li class="project-folders-v-active" <?= isset($authorized) && $authorized ? '' : 'hidden' ?>>
            <a
                href="?login=yes">Выйти</a>
        </li>
    </ul>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <?php if ($authorized) {
                (include __DIR__ . '/include/success_message.php');
            } ?>
            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с
                друзьями и просматривать списки друзей.</p>

        </td>
        <td class="right-collum-index"<?= (isset($_GET['login']) && $_GET['login'] == 'yes' && empty($authorized)) ? '' : 'hidden' ?>>

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="index-auth">
                <form action="index.php?login=yes" method="post">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш логин:</label>
                                <input id="login_id" size="30" name="login"
                                       value="<?= empty($_POST['login']) ? "" : $_POST['login'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30" name="password" type="password"
                                       value="<?= empty($_POST['password']) ? "" : $_POST['password'] ?>">
                                <?php if ($empty) {
                                    (include __DIR__ . '/include/empty_message.php');
                                } ?>
                                <?php if (!empty($_POST['login']) && !empty($_POST['password']) && !$authorized) {
                                    (include __DIR__ . '/include/error_message.php');
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </td>
    </tr>
</table>

<div class="clearfix">
    <ul class="main-menu bottom">
        <li><a href="index.php">Главная</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2018</nobr>
    Project.
</div>

</body>
</html>