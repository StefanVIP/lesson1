<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Ходько С. П.</span></div>
</div>

<div class="clear">
    <?php echo showMenu($mainMenu); ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/menuauthorized.php'; ?>
</div>
