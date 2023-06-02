<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/checkuploadedfiles.php';
$imgDir = $_SERVER['DOCUMENT_ROOT'] . '/route/gallery/upload/';

const FILE_MAX_SIZE = 2 * 1024 * 1024;
$filesData = [];

// Create array of uploaded files
if (isset($_POST['upload_file'])) {
    foreach ($_FILES as $fields) {
        foreach ($fields['name'] as $index => $file_name) {
            $filesData[] = array(
                'name' => $fields['name'][$index],
                'type' => $fields['type'][$index],
                'tmp_name' => $fields['tmp_name'][$index],
                'error' => $fields['error'][$index],
                'size' => $fields['size'][$index]);
        }
    }
}

if (isset($_POST['upload_file'])) {
    try {
        checkUploadedFiles($filesData);
        foreach ($filesData as $fileData) {
            $new_string = preg_replace('/[^ \w-]/', '_', $fileData['name']);    // Replacing characters in the title
            move_uploaded_file($fileData['tmp_name'], $imgDir . $new_string);    // All checks passed. Saving the file
        }
        // Correct download message depending on the number of files
        count($filesData) > 1 ? $ok = 'Изображения загружены успешно!' : $ok = 'Изображение загружено успешно!';

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