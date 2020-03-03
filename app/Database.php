<?php

function readUrl() 
{
    $url = "http://localhost:8001/api/users";
    
    $contents = json_decode(file_get_contents($url));

    if($contents !== false){
        foreach ($contents as $key => &$content) {

            $content = (array)$content;
        }

        foreach ($contents[1] as $key => $value) {
            if ($key) $header[] = $key;
        }
    }
    return $contents;
}