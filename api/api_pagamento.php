<?php
header('Content-Type: application/json; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$idC = $_POST['id'];
$path = "../db/bd.json";
$h = file_get_contents($path);
$dc = json_decode($h, true);

$arteste = [];

    foreach($dc as $key => $tt){
        if($tt['id'] == $idC){
            $dc[$key]['status'] = "indisponivel";
            $carF = true;
            break;
        }
    }
    if($carF){
        file_put_contents($path, json_encode($dc, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(["sucesso" => true]);
    } else {
        echo json_encode(["sucesso" => false]);
    }
}

exit;
?>