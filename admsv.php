<?php
if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0){
    $nom_arq = $_FILES['imagem']['name'];
    $tmpc = $_FILES['imagem']['tmp_name'];
    $pasta = "assets/img/";
    $camf = $pasta . $nom_arq;
    move_uploaded_file($tmpc, $camf);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
     //adicionar veículo
            $veic = $_POST["nomeVeiculo"];
            $cap = $_POST["capacidade"];
            $ar = $_POST["ar"];
            $mala = $_POST["mala"];
            $tipo = $_POST["tipo"];
            $dia = $_POST["diaria"];
            $locD = $_POST["localDisp"];
            $datI = $_POST["dataDispoP"];
            $datF = $_POST["dataDispoF"];
            $path = "bd.json"; 
            
            $og = file_get_contents($path);
            $dtJson = json_decode($og, true); 
            if(!is_array($dtJson)){
                $dtJson = [];
            }
            $bId = 0;
            foreach($dtJson as $bd){
                if (isset($bd['id']) && $bd['id'] > $bId){
                    $bId = $bd['id'];
                }
            }
            $nId = $bId + 1;

            $nJson = [
                "id" => $nId,
                "local" => $locD,
                "veiculo" => $veic,
                "imagem" => $camf,
                "capacidade" => $cap,
                "ar-condicionado" => $ar,
                "mala" => $mala,
                "tipo" => $tipo,
                "diaria" => $dia,
                "data disponivel inicial" => $datI,
                "data disponivel final" => $datF,
                "status" => "disponível"
            ];
            $dtJson[] = $nJson;
            $nw = json_encode($dtJson, JSON_PRETTY_PRINT);

           file_put_contents($path, $nw);
           header("Location: adm.html");
}
?>