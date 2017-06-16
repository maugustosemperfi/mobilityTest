








var markers = [];
var map;
var infoWindow;

function initMap() {
    var latlng = {lat: -23.592938, lng: -46.672727};
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 12,
        center: latlng
    });



    $.get(getLocalHost()+"paradas", adicionaMarcadores)
        .done(function () {
            atualizaInformacoesMapa();
        });
    $('#trigger').trigger('click');

}

function updateMap(latlng) {
    var latlng = latlng;
    map.setCenter(latlng);
    map.setZoom(16);
}

function adicionaMarcadores(dados){
    dados.forEach(function (first) {
        first.forEach(function (parada) {
            addMarker( parada.cp, parada.np ,{lat: parada.py, lng: parada.px}, map);
        });
    });
}


function addMarker(codigo, nome, location,  map) {
    var marker = new google.maps.Marker({
        position: location,
        title: nome,
        codigo: codigo,
        icon: getLocalHost()+'images/icons/parada.png',
        map: map
    });
    markers.push(marker);

}

function atualizaInformacoesMapa() {

    markers.forEach(function (marker) {
        marker.addListener('click', function () {
            buscaInformacoesParada(marker.codigo, marker);
            ativaPreLoader();
        });
    });

}


/**
 * Created by AGST on 09/06/2017.
 */
