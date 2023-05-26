<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/galleryfunction.php';
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <div class="catalog-collum-index2">
                <p></p>
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <h2>Добавление изображений в галерею</h2>
            </div>
            <td class="catalog-collum-index">
                <form id="files_form" action="/route/gallery/" method="post" enctype="multipart/form-data">
                    <p>
                        <input type="file" name="newfile[]" accept="image/*" multiple>
                        <input type="submit" name="upload_file" value="Загрузить">
                    </p>
                </form>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>