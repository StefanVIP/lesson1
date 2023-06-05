<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <?php if (isAuthorized()) {
                (include __DIR__ . '/include/success_message.php');
            } ?>
            <h1>Возможности проекта</h1>
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
                                       value="<?= empty($_POST['login']) ? $cookieLogin : $_POST['login'] ?>">
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
                                <?php if (!empty($_POST['login']) && !empty($_POST['password'])) {
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

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
