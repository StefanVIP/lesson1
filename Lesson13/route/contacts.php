<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/header.php';
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <p><strong>Контактный телефон:</strong> 8 (999) 123-45-67</p>
                <p><strong>E-mail:</strong> testsite@gmail.com</p>
                <p><strong>Телеграм:</strong> @sobaka</p>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/footer.php';
?>