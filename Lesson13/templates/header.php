<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/src/core.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/src/showmenu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/Lesson13/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>

<body>

<div class="header">
    <div class="logo"><img src="/Lesson13/i/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Ходько С. П.</span></div>
</div>

<div class="clear">
    <?php showMenu($mainMenu, 'top'); ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/menuauthorized.php'; ?>
</div>
