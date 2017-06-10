
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


/**
 * Created by AGST on 09/06/2017.
 */
