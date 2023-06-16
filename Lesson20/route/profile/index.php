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
                <p>ФИО: <?php print_r("{$profile[0][0]['surname']} {$profile[0][0]['first_name']} {$profile[0][0]['middle_name']}"); ?></p>
                <p>E-mail: <?php print_r("{$profile[0][0]['email']}"); ?></p>
                <p>Телефон: <?php print_r("{$profile[0][0]['phone_number']}"); ?></p>
                <p><b>Зарегестрирован в группах: </b></p>
                <?php foreach ($profile[0] as $group) {
                    print_r("<p>{$group['name']} - {$group['discription']};</p>");
                } ?>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>