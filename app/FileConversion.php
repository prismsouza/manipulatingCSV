<?php

function convertCSVtoArray($csv_file, $delimiter)
{
    $array = array_map(function($line) use ($delimiter) {
        return explode($delimiter, $line);
    }, $csv_file);
    return $array;
}