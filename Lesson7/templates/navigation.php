<?php
// Не используйте это решение в своих приложениях, это небольшой костыль годящийся только для задачи в данном модуле
$pathParts = explode(DIRECTORY_SEPARATOR, $_SERVER['PHP_SELF']);
$fileName = array_pop($pathParts);

$menu = [
    [
        'name' => 'Задание 1',
        'fileName' => 'task1.php',
    ],
    [
        'name' => 'Задание 2',
        'fileName' => 'task2.php',
    ],
    [
        'name' => 'Задание 3',
        'fileName' => 'task3.php',
    ],
]
?>
<nav class="bg-gray-800 p-2 mt-0 fixed w-full z-10 top-0">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
            <?php
            // Подключите здесь название сайта
            include $_SERVER['DOCUMENT_ROOT'] . '/HomeWork7 Site/templates/site_name.php';
            ?>
        </div>
        <div class="flex w-full pt-2 md:pt-0 content-center justify-between md:w-1/2 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <?php foreach ($menu as $item) {?>
                    <li class="mr-3">
                        <a 
                            class="inline-block py-2 px-4 <?=$item['fileName'] === $fileName ? 'text-white no-underline' : 'text-gray-600 no-underline hover:text-gray-200 hover:text-underline'?>"
                            href="<?=$item['fileName']?>"
                        ><?=$item['name']?></a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>