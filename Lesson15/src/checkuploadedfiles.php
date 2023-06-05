<?php
//Checking loaded files
/**
 * Checking for the number of added files
 * @param $filesData
 * @return void
 * @throws Exception
 */
function checkNumberOfFiles(array $filesData, int $limit = 5): void
{
    if (count($filesData) > $limit) {
        throw new Exception("Можно добавить не более $limit файлов одновременно");
    }
}

/**
 * Check for "no files" error
 * @param $filesData
 * @return void
 * @throws Exception
 */
function checkFileUploaded(array $filesData): void
{
    if ($filesData['error'] == 4) {
        throw new Exception('Нужно выбрать хотя бы один файл');
    }
}

/**
 * Check for errors when uploading a file
 * @param $fileData
 * @return void
 * @throws Exception
 */
function checkErrorsWhileUpload(array $fileData): void
{
    if (!empty($fileData['error'])) {
        throw new Exception('Произошла ошибка загрузки файла: ' . $fileData['name']);
    }
}

/**
 * File size check
 * @param $fileData
 * @return void
 * @throws Exception
 */
function checkFileSize(array $fileData, int $fileMaxSize = FILE_MAX_SIZE): void
{
    if ($fileData['size'] > $fileMaxSize) {
        throw new Exception('Файл не должен превышать 2 Мб: ' . $fileData['name']);
    }
}

/**
 * Checking the file type
 * @param $fileData
 * @return void
 * @throws Exception
 */
function checkFileType(array $fileData, string $fileType = 'image'): void
{
    if (explode('/', $fileData['type'])[0] !== $fileType) {
        throw new Exception('Неверный тип файла: ' . $fileData['name']);
    }
}

/**
 * @param array $fileData
 * @return void
 * @throws Exception
 */
function checkFile(array $fileData): void
{
    checkFileUploaded($fileData);

    checkErrorsWhileUpload($fileData);

    checkFileSize($fileData);

    checkFileType($fileData);

}

/**
 * Full checking uploaded files
 * @param array $filesData
 * @return void
 * @throws Exception
 */
function checkUploadedFiles(array $filesData): void
{
    checkNumberOfFiles($filesData);

    foreach ($filesData as $fileData) {
        checkFile($fileData);
    }
}

function getFiles(): array
{
    $filesData = [];
    foreach ($_FILES['newfile']['name'] as $key => $file) {
        $filesData[] = array_combine(array_keys($_FILES['newfile']), array_column($_FILES['newfile'], $key));
    }
    return $filesData;
}

function saveFile(array $fileData, string $imgDir): void
{
    $new_string = preg_replace('/[^ \w-]/', '_', $fileData['name']); // Replacing characters in the title
    move_uploaded_file($fileData['tmp_name'], $imgDir . $new_string); // All checks passed. Saving the file
}
