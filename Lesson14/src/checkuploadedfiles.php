<?php
//Checking loaded files
function checkNumberOfFiles($filesData)  // Checking for the number of added files
{
    if (count($filesData) > 5) {
        throw new Exception('Можно добавить не более 5 файлов одновременно');
    }
}

function checkFileUploaded($filesData) // Check for "no files" error
{
    if ($filesData['error'] == 4) {
        throw new Exception('Нужно выбрать хотя бы один файл');
    }
}

function checkErrorsWhileUpload($fileData)  // Check for errors when uploading a file
{
    if (!empty($fileData['error'])) {
        throw new Exception('Произошла ошибка загрузки файла: ' . $fileData['name']);
    }
}

function checkFileSize($fileData)  // File size check
{
    if ($fileData['size'] > FILE_MAX_SIZE) {
        throw new Exception('Файл не должен превышать 2 Мб: ' . $fileData['name']);
    }
}

function checkFileType($fileData)  // Checking the file type
{
    if (explode('/', $fileData['type'])[0] !== 'image') {
        throw new Exception('Неверный тип файла: ' . $fileData['name']);
    }
}

function checkFile(array $fileData): void
{
    checkFileUploaded($fileData);

    checkErrorsWhileUpload($fileData);

    checkFileSize($fileData);

    checkFileType($fileData);

}

function checkUploadedFiles(array $filesData): void
{
    checkNumberOfFiles($filesData);

    foreach ($filesData as $fileData) {
        checkFile($fileData);
    }
}
