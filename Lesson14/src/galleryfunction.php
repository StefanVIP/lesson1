<?php
$imgDir = $_SERVER['DOCUMENT_ROOT'] . '/route/gallery/upload/';

define('FILE_MAX_SIZE', 2097152);

function checkUploadedFiles(array $filesData): void
{
    checkNumberOfFiles($filesData);

    foreach ($filesData as $fileData) {
        checkFile($fileData);
    }
}

function checkFile(array $fileData): void
{
    checkFileUploaded($fileData);

    checkErrorsWhileUpload($fileData);

    checkFileSize($fileData);

    checkFileType($fileData);
}

function checkNumberOfFiles($filesData, $limit = 5): void
{
    if (count($filesData) > 5) {
        throw new Exception('Можно добавить не более 5 файлов одновременно');
    }
}

function checkFileUploaded(array $fileData): void
{
    if ($fileData['error'] === 4) {
        throw new Exception('Нужно выбрать хотя бы один файл');
    }
}

function checkErrorsWhileUpload(array $fileData): void
{
    if ($fileData['error']) {
        throw new Exception('Произошла ошибка загрузки файла: ' . $fileData['name']);
    }
}

function checkFileSize(array $fileData, int $fileMaxSize = FILE_MAX_SIZE): void
{
    if ($fileData['size'] > $fileMaxSize) {
        throw new Exception('Файл не должен превышать 2 Мб: ' . $fileData['name']);
    }
}

function checkFileType(array $fileData, $fileType = 'image'): void
{
    if (explode('/', $fileData['type'])[0] !== $fileType) {
        throw new Exception('Неверный тип файла: ' . $fileData['name']);
    }
}

function getFiles(): array
{
    $files = [];
    foreach ($_FILES['newfile']['name'] as $key => $file) {
        $files[] = array_combine(array_keys($_FILES['newfile']), array_column($_FILES['newfile'], $key));
    }
    return $files;
}

function saveFile(array $fileData, $imgDir): void
{
    $new_string = preg_replace('/[^ \w-]/', '_', $fileData['name']); // Replacing characters in the title
    move_uploaded_file($fileData['tmp_name'], $imgDir . $new_string); // All checks passed. Saving the file
}

if (isset($_POST['upload_file'])) {

    $files = getFiles();
    var_dump($files);
    exit;
    try {
        checkUploadedFiles($files);

        foreach ($files as $file) {
            saveFile($file, $imgDir);
        }

    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }

    $ok = $error ? '' : "Загрузка выполнена успешно!";
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
    if (!empty(array_diff(scandir($imgDir), array('..', '.')))) {
        $imgNames = array_diff(scandir($imgDir), array('..', '.'));

        foreach ($imgNames as $key => $name) {
            echo '<div class="image"><img src="/route/gallery/upload/' . $name . '"><span>' . $name . '</span>';
            echo "Загружен: " . date("d/m/y", filectime("$imgDir" . "$name"));
            echo sprintf('<input form="files_form" type="checkbox" name="%s" value="%s">Удалить</div>', $key, $name);
        }
    }
}