document.addEventListener("DOMContentLoaded", () => {

    const veic = sessionStorage.getItem('veiculoSelc');

     if(!veic){
        alert("Erro, nenhum veículo selecionado");
        window.location.href = "index.html";
        return;
    }

    fetch('api/sv.php')
    .then(resp => resp.json())
    .then(dadoSes => {
       const datr = dadoSes.dataR;
    const datE = dadoSes.dataE;
    
    fetch("db/bdCarros.json")
    .then(function(resposta){
        return resposta.json();
    })
    .then(dados => {
        const carroSel = dados.find(car => car.id == veic);
        for(let props in carroSel){
            document.getElementById('RcapPessoas').innerText = carroSel.capacidade;
            document.getElementById('Rmala').innerText = carroSel.mala === "true" ? "Sim" : "Não";
            document.getElementById('RarC').innerText = carroSel['ar-condicionado'] == "true" ? "Sim" : "Não";
            document.getElementById('Rtipo').innerText = carroSel.tipo;
            document.getElementById('res-dat-in').innerText = datr;
            document.getElementById('res-dat-out').innerText = datE;
         }
    });
    })
});

