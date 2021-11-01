<?php
function csvToArray (string $file) {
    @$csv= file_get_contents($file);
    if ($csv != false){
        return array_map("str_getcsv", explode("\n", $csv));
    } else {
        return false;
    }
}