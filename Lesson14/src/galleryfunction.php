<?php
$imgDir = $_SERVER['DOCUMENT_ROOT'] . '/route/gallery/upload/';

$errors = [
    'Нужно выбрать хотя бы один файл',
    'Можно добавить не более 5 файлов одновременно',
    'Произошла ошибка загрузки файла: ',
    'Файл не должен превышать 5 Мб: ',
    'Неверный тип файла: '
];

$error = "";
$ok = "";
$fileMaxSize = 2097152;

//Checking loaded files
if (isset ($_POST['upload_file'])) {
    if ($_FILES['newfile']['error'][0] !== 4) {    // Check for "no files" error
        if (count($_FILES['newfile']['error']) > 5) {    // Checking for the number of added files
            $error = $errors[1];    // Error: "Можно добавить не более 5 файлов одновременно"
        } else {
            for ($i = 0; $i < count($_FILES['newfile']['error']); $i++) {    // Looping through the array with uploaded files
                if (!empty($_FILES['newfile']['error'][$i])) {    // Check for errors when uploading a file
                    $error = $errors[2] . $_FILES['newfile']['name'][$i];    // Error: "Произошла ошибка загрузки файла"
                } else {
                    if ($_FILES['newfile']['size'][$i] < $fileMaxSize) {    // File size check
                        if (explode('/', $_FILES['newfile']['type'][$i])[0] == 'image') {    // Checking the file type
                            $new_string = preg_replace('/[^ \w-]/', '_', $_FILES['newfile']['name'][$i]);    // Replacing characters in the title
                            move_uploaded_file($_FILES['newfile']['tmp_name'][$i], $imgDir . $new_string);    // All checks passed. Saving the file
                            $ok = "Загрузка выполнена успешно!";
                        } else {
                            $error = $errors[4] . $_FILES['newfile']['name'][$i]; // Error: "Неверный тип файла"
                        }
                    } else {
                        $error = $errors[3] . $_FILES['newfile']['name'][$i]; // Error: "Файл не должен превышать 5 Мб"
                    }
                }
            }
        }
    } else {
        $error = $errors[0];

    }

}
// Delete pointed images
if (isset($_POST['delete_file'])) {
    $delFiles = $_POST;

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

function showGallary($imgDir)
{
    if (!empty (array_diff(scandir($imgDir), array('..', '.')))) {
        $imgNames = array_diff(scandir($imgDir), array('..', '.'));

        foreach ($imgNames as $key => $name) {
            echo '<div class="image"><img src="/route/gallery/upload/' . $name . '"><span>' . $name . '</span>';
            echo "Загружен: " . date("d/m/y", filectime("$imgDir" . "$name"));
            echo sprintf('<input form="files_form" type="checkbox" name="%s" value="%s">Удалить</div>', $key, $name);
        }
    }
}