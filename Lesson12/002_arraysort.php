<?php
function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    $x = function ($a, $b) use ($key, $sort) {
        if ($a[$key] == $b[$key]) return 0;
        elseif ($sort == SORT_DESC) return ($a[$key] < $b[$key]) ? 1 : -1;
        else return ($a[$key] < $b[$key]) ? -1 : 1;
    };

    usort($array, $x);

    return $array;
}
