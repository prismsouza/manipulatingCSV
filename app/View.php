<?php

namespace App;

class View {
    
    public function showTable($database, $header)
    {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>";
        foreach ($header as $h_field) {
            echo "<td>" . $h_field . "</td>";
        }
        echo "</tr>";
        
        foreach ($database as $registry) {
            echo "<tr>";
            foreach ($registry as $value) { 
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table><br><br>";
    }

    public function showList($data)
    {
        foreach ($data as $value) {
            echo $value . "<br>";
        }
        echo "<br>";
    }
}