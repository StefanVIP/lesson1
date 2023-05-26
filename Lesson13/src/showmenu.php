<?php
/**
 * Function to place main menu
 * @param array $mainMenu
 * @param string $style
 * @return void
 */
//function showMenu(array $mainMenu, string $style)
//{
//    echo sprintf(
//        '<ul class="%s">',
//        $style == 'top' ? 'main-menu' : 'main-menu bottom'
//    );
//
//    if ($style == 'top') {
//        $mainMenu = arraySort($mainMenu, 'sort', SORT_ASC);
//    } elseif ($style == 'bottom') {
//        $mainMenu = arraySort($mainMenu, 'title', SORT_DESC);
//    }
//
//    foreach ($mainMenu as $paragraph) {
//        echo sprintf('<li class="%s"><a href="%s">%s</a></li>',
//            $_SERVER["REQUEST_URI"] == $paragraph['path'] ? 'active' : '',
//            $paragraph['path'],
//            iconv_strlen($paragraph['title']) > 15 ? cutString($paragraph['title']) : $paragraph['title']
//        );
//    }
//    echo '</ul>';
//}

function showMenu(array $mainMenu, string $style = '', string $sortBy = 'sort', int $sortOrder = SORT_ASC): string
{
    $menuHtml = sprintf(
        '<ul class="main-menu %s">',
        $style
    );

    foreach (arraySort($mainMenu, $sortBy, $sortOrder) as $paragraph) {
        $menuHtml .= sprintf('<li class="%s"><a href="%s">%s</a></li>',
            $_SERVER["REQUEST_URI"] == $paragraph['path'] ? 'active' : '',
            $paragraph['path'],
            iconv_strlen($paragraph['title']) > 15 ? cutString($paragraph['title']) : $paragraph['title']
        );
    }

    $menuHtml .= '</ul>';

    return $menuHtml;
}
