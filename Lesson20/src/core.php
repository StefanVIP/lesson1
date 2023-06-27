<?php
// declare(strict_types=1);
$imgDir = $_SERVER['DOCUMENT_ROOT'] . '/route/gallery/upload/';
const FILE_MAX_SIZE = 2 * 1024 * 1024;
$filesData = [];

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/DbConnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/Authorization.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/UserStorage.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/Message.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/class/MessageStorage.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main_menu.php';

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

// Database Connect
$dbConfiguration = require_once __DIR__ . '/settings.php';

$connect = DbConnect::getInstance();
$connect->configure($dbConfiguration);
$connect = $connect->getConnection();

// Authorization
$cookieId = '';
$empty = false;

$userAuth = new Authorization();

if (!empty ($_POST)) {
    $empty = empty($_POST['login']) || empty($_POST['password']);

    if (!$empty) {
        $authorized = $userAuth->authorize($_POST['login'], $_POST['password']);
    }
}

//If the user is logged in, update the "login" cookie expiration time
if (isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60 * 60 * 24 * 30, '/');
    $cookieId = $_COOKIE['login'];
}

// Processing logout link
if (isset($_GET['logout'])) {
    $userAuth->logout();
}

if (isset($_SESSION['user'])) {
    $userStorage = new UserStorage($connect);
    $user = $userStorage->getUserById($_SESSION['user']);
    $messageStorage = new MessageStorage($connect, $userStorage);
    $incomingMessages = $messageStorage->getMessagesListByRecipientId($_SESSION['user']);
    $outgoingMessages = $messageStorage->getMessagesListBySenderId($_SESSION['user']);
}

if (isset($_POST['submit_message'])) {
    if (empty($_POST['title']) || empty($_POST['text'])) {
        $errorEmpty = 'Поля не могут быть пустыми';
    } else {
        $result = $messageStorage->addNewMessage($_POST['title'], $_POST['text'], $_SESSION['user'], $_POST['recipient']);
        $successSend = 'Сообщение отправлено';
    }
}
