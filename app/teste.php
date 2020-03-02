<?php

$arrayTeste = [2, 4, 8, 16];

foreach ($arrayTeste as &$a) {
    $a = 4;
}

var_dump($arrayTeste);