<?php
       header('Content-Type: application/json; charset=utf-8');
       /*$arteste = [];
       $path = "bd.json"; 
            $h = file_get_contents($path);
            $dc = json_decode($h, true);*/
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    
       if($_SERVER["REQUEST_METHOD"] == "POST"){

            //pesquisar veiculo
            $_SESSION['bloc'] = $_POST["local"];
            $_SESSION['bdatret'] = $_POST["dataRet"];
            $_SESSION['bdatent'] = $_POST["dataEnt"];
            $_SESSION['carSel'] = $_POST["veicSel"];
            
            /*
            foreach($dc as $tt){
                if($tt['local'] == $loc){
                $arteste[] = $tt['id'];
                }
            }
                */
            http_response_code(200);
            echo json_encode([
                "status" => 'sucesso'
            ]);
        
           exit;
        }
        echo json_encode([
            "dataR" => $_SESSION['bdatret'],
                "dataE" => $_SESSION['bdatent']
        ]);
        exit;
?>