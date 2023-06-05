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
                <a class="link" href="/route/gallery/create/">Добавить изображения</a>
            </div>
            <td class="catalog-collum-index">
                <form id="files_form" action="/route/gallery/" method="post" enctype="multipart/form-data">
                    <p>Удаление изображений</p>
                    <p>
                        <input type="checkbox" name="delete_files" value="all">Удалить всё</div>
                        <input type="submit" name="delete_file" value="Удалить">
                    </p>
                </form>

                <p class="error"><?= $error ?? '' ?></p>
                <p class="ok"><?= $ok ?? '' ?></p>

                <div class="gallery">
                    <?php
                    showGallary($imgDir)
                    ?>
                </div>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>