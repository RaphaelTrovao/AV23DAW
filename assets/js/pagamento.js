document.addEventListener("DOMContentLoaded", () => {

    const veic = sessionStorage.getItem('veiculoSelc');

    if(!veic){
        alert("Erro, nenhum veículo selecionado");
        window.location.href = "index.html";
        return;
    }

    fetch("db/bd.json")
    .then(resposta => resposta.json())
    .then(dados => {

        const carrEsc = dados.find(car => car.id == veic);
        if(carrEsc){
            document.getElementById('img-car').src = carrEsc.imagem;
            
        const inpId = document.getElementById('inpId');
        if(inpId){
            inpId.value = carrEsc.id;
        }
        }
    })
});
document.getElementById('Fpagamento').addEventListener('submit', function(evn){
    evn.preventDefault();
    const dataform = new FormData(this);
    fetch('api/api_pagamento.php',{
        method: 'POST',
        body: dataform
    })
    .then(resposta => resposta.json())
    .then(retorno => {
        if(retorno.sucesso){
            alert("compra finalizada");
            window.location.href = "recibo.html";
        } else {
            alert("erro: " + retorno.msg);
        }
    });
});
