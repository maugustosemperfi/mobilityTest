/**
 * Created by AGST on 10/06/2017.
 */


$('.parada').click(function () {
    setTimeout(function () {
        var latlng = {lat: parseFloat(getParameterByName('x')), lng: parseFloat(getParameterByName('y'))};
        updateMap(latlng);
        buscaInformacoesParada(getParameterByName('codParada'));

    }, 100);

});

function buscaInformacoesParada(codigoParada) {
    $.get(getLocalHost(window.location.href)+"parada/"+codigoParada, function (data) {
        atualizaInformacoes(data.np);
        data.l.forEach(function (linha) {
            criaBotoesdaLinha(linha.cl, codigoParada);
            console.log(codigoParada);
        }, codigoParada);

    });
}
function criaBotoesdaLinha(cl, codigoParada) {
    var chatItem = `
        <a href="javascript:void(0)" class="chat-message collapsible-header" >
            <div class="chat-item">
                <div class="chat-item-image">
                    <img src=${getLocalHost(window.location.href)}images/icons/onibus.png class="" alt="Clique para exibir os horários">
                </div>
                <div class="chat-item-info">
                    <p class="chat-name" id=${cl}>${cl}</p>
                    <span class="chat-message">Clique para exibir os horários</span>
                </div>
            </div>
        </a>
    `;

    var linha = $('<a>');
    linha.attr('class', 'btn btn-primary col-md-2 linha');
    linha.attr('id', cl);
    linha.text(cl);
    $('#stopRoutes').append(chatItem);
    atribuiFuncaodaLinha(cl, codigoParada);

}

function atualizaInformacoes(np) {
    $('#stopName').text(np);
    $('#stopRoutes').empty();
    $('#previsaoChegada').empty();

}

function atribuiFuncaodaLinha(cl, codigoParada){

    $('#'+cl).click({codigo: codigoParada} ,function (event) {
        buscaPrevisaoChegada(event.data.codigo, $(this).text());
        console.log(event.data.codigo);

    });
}



function buscaPrevisaoChegada(codigoParada, codigoLinha) {
    $.get(getLocalHost(window.location.href)+'Parada/'+codigoParada+'/'+codigoLinha, function (data) {
        $('#previsaoChegada').empty();
        data.forEach(function (posicao) {
            criaElementosChegada(posicao.t);
        })
    });
}


function criaElementosChegada(tempo) {
    var li = $('<li>');
    li.text(tempo);
    $('#previsaoChegada').append(li);
}

