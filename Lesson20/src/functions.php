<?php
/**
 * Function to sort array with the certain key
 * @param array $array
 * @param string $key
 * @param int $sort
 * @return array
 */
function arraySort(array $array, string $key = 'sort', int $sort = SORT_ASC): array
{
    $x = function ($a, $b) use ($key, $sort) {
        $result = $a[$key] <=> $b[$key];
        return $sort === SORT_ASC ? $result : -$result;
    };

    usort($array, $x);

    return $array;
}

/**
 * Function to trim a string for a certain number of characters
 * @param string $line
 * @param int $length
 * @param string $appends
 * @return string
 */
function cutString(string $line, int $length = 12, string $appends = '...'): string
{
    if (strlen($line) > $length) {
        return mb_substr($line, 0, $length) . $appends;
    } else {
        return $line;
    }
}

/**
 * Function to make headline from URI
 * @param $mainMenu
 * @return void
 */
function makeHeadline($mainMenu): string
{
    foreach ($mainMenu as $value) {
        if ($value['path'] == $_SERVER["REQUEST_URI"]) {
            echo $value['title'];
        }
    }
}

/**
 * @param array $mainMenu
 * @param string $style
 * @param string $sortBy
 * @param int $sortOrder
 * @return string
 */
function showMenu(array $mainMenu, string $style = '', string $sortBy = 'sort', int $sortOrder = SORT_ASC): string
{
    global $userAuth;
    $menuHtml = sprintf(
        '<ul class="main-menu %s">',
        $style
    );

    foreach (arraySort($mainMenu, $sortBy, $sortOrder) as $paragraph) {
        $menuHtml .= sprintf('<li class="%s"><a href="%s">%s</a></li>',
            $_SERVER["REQUEST_URI"] == $paragraph['path'] ? 'active' : '',
            $userAuth->isAuthorized() ? $paragraph['path'] : '/index.php?login=yes',
            iconv_strlen($paragraph['title']) > 15 ? cutString($paragraph['title']) : $paragraph['title']
        );
    }

    $menuHtml .= '</ul>';

    return $menuHtml;
}

// Gallery start
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

/**
 * Function for showing gallery
 * @param $imgDir
 * @return void
 */
function showGallary($imgDir): string
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
// Gallery end
