<?php
//Checking loaded files
/**
 * Checking for the number of added files
 * @param $filesData
 * @return void
 * @throws Exception
 */
function checkNumberOfFiles($filesData)
{
    if (count($filesData) > 5) {
        throw new Exception('Можно добавить не более 5 файлов одновременно');
    }
}

/**
 * Check for "no files" error
 * @param $filesData
 * @return void
 * @throws Exception
 */
function checkFileUploaded($filesData)
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
function checkErrorsWhileUpload($fileData)
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
function checkFileSize($fileData)
{
    if ($fileData['size'] > FILE_MAX_SIZE) {
        throw new Exception('Файл не должен превышать 2 Мб: ' . $fileData['name']);
    }
}

/**
 * Checking the file type
 * @param $fileData
 * @return void
 * @throws Exception
 */
function checkFileType($fileData)
{
    if (explode('/', $fileData['type'])[0] !== 'image') {
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
