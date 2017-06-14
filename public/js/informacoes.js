/**
 * Created by AGST on 10/06/2017.
 */


$('.parada').click(function () {
    setTimeout(function () {
        var latlng = {lat: parseFloat(getParameterByName('x')), lng: parseFloat(getParameterByName('y'))};
        updateMap(latlng);
        buscaInformacoesParada(getParameterByName('codParada'));
        $('.collapsible').collapsible();
    }, 100);

});

function buscaInformacoesParada(codigoParada) {
    $.get(getLocalHost()+"parada/"+codigoParada, function (data) {
        atualizaInformacoes(data.np);
        data.l.forEach(function (linha) {
            buscaPrevisaoChegada(codigoParada, linha.cl);

        }, codigoParada);

    });
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

function atualizaInformacoes(np) {
    $('#stopName').text(np);
    $('#stops').empty();
    $('#previsaoChegada').empty();

}

function buscaPrevisaoChegada(codigoParada, codigoLinha) {
    var horarios = [];

    $.get(getLocalHost()+'Parada/'+codigoParada+'/'+codigoLinha)
        .done(function (data) {
            data.forEach(function (posicao) {
                horarios.push(posicao.t);
            });
            criaBotoesdaLinha(codigoLinha, horarios);
            return horarios;
        });



}

