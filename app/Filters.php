<?php

function searchForData($registry, $dataToSearch) 
{
    foreach ($registry as $key => $value) {
        if (strtoupper($value) == strtoupper($dataToSearch)) {
            return $registry;
        }
    }
    return 0;
}

/*function filterRegistry($registry, $dataToSearch)
{
    $filteredRegistry = searchForData($registry, $dataToSearch);
    if ($filteredRegistry) return $filteredRegistry;
}*/

function filterRegistry($array, $dataToSearch)
{
    foreach ($array as $registry) {
        $r = searchForData($registry, $dataToSearch);
        if ($r) {
            $filteredRegistry[] = $r;
        }
    }
    return $filteredRegistry;
}

function filterByKey($array, $field)
{
    $filteredRegistry = [];
    foreach ($array as $registry) {
        if ($registry[$field]) {
            $filteredRegistry[] = $registry[$field];
        }
    }
    return $filteredRegistry;
}