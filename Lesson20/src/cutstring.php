<?php
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