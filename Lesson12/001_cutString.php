<?php
function cutString($line, $length = 12, $appends = '...'): string
{
    if (strlen($line) > $length) {
        return mb_substr($line, 0, $length) . $appends;
    } else {
        return $line;
    }
}