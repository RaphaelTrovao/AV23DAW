<?php
function abrirBD(){
    $path = "../db/bdCarros.json";

    if(!file_exists($path)){
        return[];
    }
    $h = file_get_contents($path);
    return json_decode($h, true);
}
?>