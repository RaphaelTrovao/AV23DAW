<?php
header('Content-Type: application/json; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$loc = $_SESSION['bloc'];
$datRet = $_SESSION['bdatret'];
$datEnt = $_SESSION['bdatent'];
$path = "../db/bd.json";
$h = file_get_contents($path);
$dc = json_decode($h, true);

$arteste = [];
if($loc !== ''){
    foreach($dc as $tt){
        if($tt['status'] == "disponivel" && $tt['local'] == $loc && $tt['data disponivel inicial'] == $datRet && $tt['data disponivel final'] == $datEnt){
            $arteste[] = $tt;
        }
    }
}
echo json_encode([
    "sucesso" => true,
    "quantt" => count($arteste),
    "veiculos" => $arteste
]);

exit;
?>