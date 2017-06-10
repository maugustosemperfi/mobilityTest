/**
 * Created by AGST on 10/06/2017.
 */
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$('.teste').click(function () {
    setTimeout(function () {
        var latlng = {lat: parseFloat(getParameterByName('x')), lng: parseFloat(getParameterByName('y'))};
        updateMap(latlng);
        buscaInformacoesParada(getParameterByName('codParada'))
    }, 100);

});

function buscaInformacoesParada(codigoParada) {
    $.get("http://localhost:8000/Parada/"+codigoParada, function (data) {

        atualizaInformacoes(data.np);
        data.l.forEach(function (linha) {
            criaBotoesdaLinha(linha.cl);
        });

    });
}
function criaBotoesdaLinha(cl) {
    var linha = $('<a>');
    linha.attr('class', 'btn btn-primary col-md-2 linha');
    linha.attr('id', cl);
    linha.text(cl);
    $('#stopRoutes').append(linha);
    atribuiFuncaodaLinha(cl);

}

function atualizaInformacoes(np) {
    $('#stopName').text(np);
    $('#stopRoutes').empty();
}

function atribuiFuncaodaLinha(cl){
    $('#'+cl).click(function () {
        buscaPrevisaoChegada(getParameterByName('codParada'), $(this).text());


    });
}



function buscaPrevisaoChegada(codigoParada, codigoLinha) {
    $.get('http://localhost:8000/Parada/'+codigoParada+'/'+codigoLinha, function (data) {
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

