
function initMap() {
    var latlng = {lat: -23.592938, lng: -46.672727};
    console.log(latlng);
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: latlng
    });
    var marker = new google.maps.Marker({
        position: latlng,
        map: map
    });

}
function updateMap(latlng) {
    var latlng = latlng;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: latlng
    });
    var marker = new google.maps.Marker({
        position: latlng,
        map: map
    });

}
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

        $('#stopName').text(data.np);
        var array = '';
        data.l.forEach(function (linha) {
            array = array + linha.cl;
        });
        $('#stopRoutes').text(array);
    });
}

/**
 * Created by AGST on 09/06/2017.
 */
