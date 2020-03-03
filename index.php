<?php

require __DIR__ . '/vendor/autoload.php';
use App\View;
use App\ManipulateArray;

$contents= readUrl();
$arrayObj = new ManipulateArray($contents, 0); // doesnt have a header
$header = $arrayObj->getHeader();
$view = new View();

if(isset($_POST['submit1'])) {
    $view->showTable($contents, $header);
}

if(isset($_POST['submit2'])) {
    $dataToSearch = ($_POST['submitContent']);
    $filteredRegistries = filterRegistry($contents, strtoupper($dataToSearch));
    $view->showTable($filteredRegistries, $header);
}

if(isset($_POST['submit3'])) {
    $key = $_POST['submitKey'];
    $filteredByKey = filterByKey($contents, $key);
    $view->showList($filteredByKey);
}

?>