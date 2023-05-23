<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/header.php';
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <div class="catalog-collum-index2">
                <p></p>
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <h2>Пёсики</h2>
            </div>
            <td class="catalog-collum-index">
                <div><img src="/Lesson13/i/dog.jfif" alt="Project"></div>
                <p>Пёсик 1</p>
            </td>
            <td class="catalog-collum-index">
                <div><img src="/Lesson13/i/dog.jfif" alt="Project"></div>
                <p>Пёсик 2</p>
            </td>
            <td class="catalog-collum-index">
                <div><img src="/Lesson13/i/dog.jfif" alt="Project"></div>
                <p>Пёсик 3</p>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/footer.php';
?>