<?php
/**
 * Function to make headline from URI
 * @param $mainMenu
 * @return void
 */
function makeHeadline($mainMenu)
{
    foreach ($mainMenu as $value) {
        if ($value['path'] == $_SERVER["REQUEST_URI"]) {
            echo $value['title'];
        }
    }
}

