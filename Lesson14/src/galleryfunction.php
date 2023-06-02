<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/checkuploadedfiles.php';
$imgDir = $_SERVER['DOCUMENT_ROOT'] . '/route/gallery/upload/';

const FILE_MAX_SIZE = 2 * 1024 * 1024;
$filesData = [];

if (isset($_POST['upload_file'])) {

    $filesData = getFiles();

    try {
        checkUploadedFiles($filesData);

        // Correct download message depending on the number of files
        $ok = count($filesData) > 1 ? 'Изображения загружены успешно!' : 'Изображение загружено успешно!';

        foreach ($filesData as $fileData) {
            saveFile($fileData, $imgDir);
        }

    } catch (Exception $e) {
        $error = 'Ошибка: ' . $e->getMessage();
    }
}

// Delete pointed images
if (isset($_POST['delete_file']) && isset($_POST['images'])) {
    $delFiles = $_POST['images'];

    if (!empty($delFiles)) {
        foreach ($delFiles as $file) {
            unlink($imgDir . $file);
        }
    }
}
// Delete all images
if (isset($_POST['delete_files'])) {
    $files = glob("$imgDir" . "*"); // get all file names
    foreach ($files as $file) { // iterate files
        if (is_file($file)) {
            unlink($file); // delete file
        }
    }
}

/**
 * Function for showing gallery
 * @param $imgDir
 * @return void
 */
function showGallary($imgDir)
{
    if (!empty (array_diff(scandir($imgDir), array('..', '.')))) {
        $imgNames = array_diff(scandir($imgDir), array('..', '.'));

        foreach ($imgNames as $key => $name) {
            echo '<div class="image"><img src="/route/gallery/upload/' . $name . '"><span>' . $name . '</span>';
            echo "Загружен: " . date("d/m/y", filectime("$imgDir" . "$name"));
            echo sprintf('<input form="files_form" type="checkbox" name="images[]" value="%s">Удалить</div>', $name);
        }
    }
}