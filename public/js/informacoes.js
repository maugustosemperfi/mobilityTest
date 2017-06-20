/**
 * Created by AGST on 10/06/2017.
 */


$('.parada').click(function () {
    setTimeout(function () {
        var latlng = {lat: parseFloat(getParameterByName('x')), lng: parseFloat(getParameterByName('y'))};
        updateMap(latlng);
        ativaPreLoader();
        buscaInformacoesParada(getParameterByName('codParada'));
        mostraInformacoes();
    }, 100);
});

function buscaInformacoesParada(codigoParada) {
    $.get(getLocalHost()+"previsaoChegada/"+codigoParada, function (data) {
        atualizaInformacoes(data.np, data.py, data.px);
        buscaPrevisaoChegada(data.l);

    })
        .done(function () {
            desativaPreLoader();
        });
}


function atualizaInformacoes(np, lat, lng) {
    $('#stops').empty();
    $.get(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=AIzaSyCa8L0l4Jd4iti6QiaDnWBeUNPIqsEVwJw`)
        .done(function (data) {
            $('#stopName').text(np);
            $('#stopAddres').text(data.results[0].formatted_address);
        });

}


function buscaPrevisaoChegada(linhas) {
    try {
        linhas.forEach(function (linha) {
            var horarios = []
            linha.vs.forEach(function (tempo) {
                horarios.push(tempo.t);
            });
            criaBotoesdaLinha(linha.cl, horarios);
        });
    }
    catch(err){
        Materialize.toast('Ocorreu um erro. Por favor, tente novamente.', 3000);
        $('#stopName').text('');
        $('#stopAddres').text('');
        desativaPreLoader();
    }
}

function criaBotoesdaLinha(cl, horarios) {
    var chatItem = `
        <li>
             <div class="chat-list collapsible-header" id="stopRoutes"  >
                 <div class="chat-item">
                     <div class="chat-item-image">
                        <img src=${getLocalHost()}images/icons/onibus.png class="" alt="Clique para exibir os horários">
                     </div>
                     <div class="chat-item-info">
                         <p class="chat-name">${cl}</p>
                         <span class="chat-message">Clique para exibir os horários</span>
                     </div>
                 </div>
             </div>
             <div class="collapsible-body">
                     <div class="messages-container">
                        <div class="message-wrapper them">
                             <div class="circle-wrapper"><img src=${getLocalHost()}images/icons/clock.png class="" alt=""></div>
                             <div class="text-wrapper">
                                <ul>
                                     ${horarios.map(t=>`<li>${t}</li>`).join('')}
                                </ul>
                            </div>
                        </div>
                    </div>
             </div>
         </li>
    `;
    $('#stops').append(chatItem);

}

function mostraInformacoes(){
    chat = $('#chat-sidebar');
    if(chat.css('transform') == 'matrix(1, 0, 0, 1, 372, 0)'){
        $('#trigger').trigger('click');
    }
}

function buscaEndereco(lat, lng){

}




