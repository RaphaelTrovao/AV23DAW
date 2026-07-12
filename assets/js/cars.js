const boxs = document.getElementById('carDivs');

function renderCar(){
    fetch('api/api_selCars.php')
    .then(resposta => resposta.json())
    .then(dados => {
        boxs.innerHTML = '';
        if(dados.quantt === 0){
            boxs.innerHTML = '<p>Nenhum Veículo Disponível<p>'
            return;        
        }

        const htmlCars = dados.veiculos.map(carro => {
            return `
            <div class="carBox">
            <img src="${carro.imagem}" alt="car" class="imgem">
            <h2>${carro.veiculo}</h2>
            <p>${carro.capacidade}</p>
            ${carro.mala == "true" ? '<p>Mala</p>' : ''}
            ${carro['ar-condicionado'] == "true" ? '<p>Ar-condicionado</p>' : ''}
            <p>${carro.tipo}</p>
            <h1>${carro.diaria}</h1>
            <button onclick="selectCar(${carro.id})">Alugar</button>
            </div>
            `;
        }).join('');
        boxs.innerHTML = htmlCars;
        })
        .catch(erro => console.error("Erro", erro));
}


function selectCar(idc){
    sessionStorage.setItem('veiculoSelc', idc);

    window.location.href = 'dadosVeiculo.html';
}   

document.addEventListener("DOMContentLoaded", renderCar);