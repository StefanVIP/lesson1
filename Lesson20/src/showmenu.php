<?php

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
