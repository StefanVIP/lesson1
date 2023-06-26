<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
// $userAuth->isAuthorized() ?: header("Location: /index.php?login=yes");
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <h2>Информация о вашем профиле:</h2>
                <p>ФИО: <?= $user->getUserFullName() ?></p>
                <p>E-mail: <?= $user->getUserEmail() ?></p>
                <p>Телефон: <?= $user->getUserPhoneNumber() ?></p>
                <p><b>Зарегестрирован в группах: </b></p>
                <?php foreach (array_combine($user->getUserGroup(), $user->getUserGroupDescription()) as $group => $desc) {
                    print_r("<p>{$group} - {$desc};</p>");
                } ?>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
