var contentString = '<div class="content"'+
    '<div class="col-md-4 ">'+
    '<div class="panel panel-default">'+
    '<div class="panel-heading">'+
    '<h4>Informações</h4>'+
    '</div>'+
    '<div class="panel-body">'+
    '<p>Nome da Parada: <span id="stopName"></span> </p>'+
    '<p>Endereço da Parada: <span id="stopAddr"></span></p>'+
    '<p>Linhas da parada: </p><span id="stopRoutes"></span>'+
    '<ul class="list-unstyled" id="previsaoChegada">'+
    '</ul>'+
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';








var markers = [];
var map;
var infoWindow;

function initMap() {
    var latlng = {lat: -23.592938, lng: -46.672727};
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 12,
        center: latlng
    });

    infoWindow = new google.maps.InfoWindow({
        content: contentString
    });

    $.get(getLocalHost()+"paradas", adicionaMarcadores)
        .done(function () {
            adicionaWindowsInfo();
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

function adicionaWindowsInfo() {

    markers.forEach(function (marker) {
        marker.addListener('click', function () {
            infoWindow.open(map, marker);
            buscaInformacoesParada(marker.codigo, marker);
        });
    });

}


/**
 * Created by AGST on 09/06/2017.
 */
