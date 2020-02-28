<?php

function searchForData($registry, $dataToSearch) 
{
    foreach ($registry as $key => $value) {
        if ($value == $dataToSearch) {
            return $registry;
        }
    }
    return 0;
}

function filterRegistry($registry, $dataToSearch)
{
    $filteredRegistry = searchForData($registry, $dataToSearch);
    if ($filteredRegistry) return $filteredRegistry;
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