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
