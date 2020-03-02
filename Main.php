<?php

require __DIR__ . '/vendor/autoload.php';

use App\Csv;
use App\ManipulateArray;
use App\View;

$csvObject = new csv("militares10.csv", ",", 1);
$view = new View();

$fileCsv = $csvObject->getCsvFile();
$delimiter = $csvObject->delimiter;
$array = convertCSVtoArray($fileCsv, $delimiter);

$arrayObject = new ManipulateArray($array);
$arrayUsers = $arrayObject->getArray();

$date_fields = ["birth_date", "inclusion_date" , "recadastration_date"];
foreach ($arrayUsers as &$registry) {
    foreach($date_fields as $date) {
        $registry[$date] = getDateFromUsaFormatToBrazilian($registry[$date]);
    }
    $registry['number'] = removeSymbol($registry['number'], "-");
    $registry['is_active'] = strtoupper($registry['is_active']);
}
$arrayObject->setArray($arrayUsers);

echo "<b>All Results</b>";
$view->showTable($arrayObject->getArray(), $arrayObject->getArrayHeader());

$filteredRegistries = [];
$dataToSearch = "F";
echo "<br><b>Filter Registries By Content: </b>" . strtoupper($dataToSearch) . "<br>";
foreach ($arrayObject->getArray() as $r) {
    $r = filterRegistry($r, strtoupper($dataToSearch));
    if ($r) $filteredRegistries[] = $r;
}
$view->showTable($filteredRegistries, $arrayObject->getArrayHeader());

echo "<br><b>Get Registries by Number 1640184, 1640226 and 1640192: </b><br>";
$registries = [];
$registries[] = $arrayObject->getRegistryByFieldContent("number", "1640184");
$registries[] = $arrayObject->getRegistryByFieldContent("number", "1640226");
$registries[] = $arrayObject->getRegistryByFieldContent("number", "1640192");
$view->showTable($registries, $arrayObject->getArrayHeader());

$key = "name";
echo "<br><b>Filter Elements By Key: </b>" . $key. "<br>";
$filteredByKey = filterByKey($arrayObject->getArray(), $key);
$view->showList($filteredByKey);

function dumpArray($array)
{
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}