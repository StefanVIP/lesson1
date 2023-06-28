<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <h2>Информация о вашем профиле:</h2>
                <p>ФИО: <?= $user->getUserFullName() ?></p>
                <p>E-mail: <?= $user->getEmail() ?></p>
                <p>Телефон: <?= $user->getPhoneNumber() ?></p>
                <p><b>Зарегестрирован в группах: </b></p>
                <?php foreach ($user->getGroups() as $group) {
                    print_r("<p>{$group['name']} - {$group['discription']};</p>");
                } ?>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
