/**
 * Created by AGST on 10/06/2017.
 */


$('.teste').click(function () {
    setTimeout(function () {
        var latlng = {lat: parseFloat(getParameterByName('x')), lng: parseFloat(getParameterByName('y'))};
        updateMap(latlng);
        buscaInformacoesParada(getParameterByName('codParada'))
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
    var linha = $('<a>');
    linha.attr('class', 'btn btn-primary col-md-2 linha');
    linha.attr('id', cl);
    linha.text(cl);
    $('#stopRoutes').append(linha);
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

