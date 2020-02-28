<?php

function getDateFromUsaFormatToBrazilian($usaDateFormat) 
{
    $brazilianDateFormat = str_split($usaDateFormat, 10);
    $brazilianDateFormat = date("d/m/Y", strtotime($brazilianDateFormat[0]));
    return $brazilianDateFormat;
}

function removeSymbol($string, $symbol)
{
    $updated_string = preg_replace('/'.$symbol.'/','', $string);
    return $updated_string;
}