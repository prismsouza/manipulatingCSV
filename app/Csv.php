<?php

namespace App;

class csv {
    public $fileName;
    private $csvFile;
    private $csvHeader;
    public $delimiter;

    public function __construct ($fileName, $delimiter, $hasHeader) 
    {
        $this->fileName = $fileName;
        $this->csvFile = file($this->fileName);
        $this->delimiter = $delimiter;
        if ($hasHeader) {
            $this->csvHeader = $this->csvFile[0];
        }
    }

    public function setFile($fileName) 
    {
        $this->fileName = $fileName;
    }

    public function getCsvFile()
    {
        return $this->csvFile;
    }
}


/*
    public function convertCSVtoArray($csv_file)
    {
        $array = array_map(function($line) {
            return explode($this->delimiter, $line);
        }, $csv_file);
        return $array;
    }
    public function convertCSVtoArrayKeyColumn() 
    {
        $this->arrayFile = $this->convertCSVtoArray($this->csvFile);
        $this->setArrayHeader(); 
        $this->arrayFile = $this->arrayKeyColumn($this->arrayFile);
    }*/
