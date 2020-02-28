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
$arrayUsers = $arrayObject->array;

$arrayObject->eraseArray();
$date_fields = ["birth_date", "inclusion_date" , "recadastration_date"];
foreach ($arrayUsers as &$registry) {
    foreach($date_fields as $date) {
        $registry[$date] = getDateFromUsaFormatToBrazilian($registry[$date]);
    }
    $registry['number'] = removeSymbol($registry['number'], "-");
    $registry['is_active'] = strtoupper($registry['is_active']);
    $arrayObject->setRegistry($registry);
    $arrayObject->updateArray($registry['id']);
}

echo "<b>All Results</b>";
$view->showTable($arrayObject->getArray(), $arrayObject->getArrayHeader());

// Filtering
$dataToSearch = "F";
echo "<br><b>Filter Registries By Female Gender: </b>" . $dataToSearch . "<br>";
foreach ($arrayObject->getArray() as $registry) {
    $r = filterRegistry($registry, $dataToSearch);
    if ($r) $filteredRegistries[] = $r;
}
$view->showTable($filteredRegistries, $arrayObject->getArrayHeader());

echo "<br><b>Get Registries with ID 3, 4 and 5: </b><br>";
$registry = [];
$registry[] = $arrayObject->getRegistry(3);
$registry[] = $arrayObject->getRegistry(4);
$registry[] = $arrayObject->getRegistry(5);
$view->showTable($registry, $arrayObject->getArrayHeader());

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
//Editei alguma coisa
