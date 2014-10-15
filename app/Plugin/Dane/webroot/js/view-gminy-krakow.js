var map;

function initialize() {
    var mapOptions = {
        zoom: 10
    };
    map = new google.maps.Map(document.getElementById('dzielnice_map'), mapOptions);

    var kmlUrl = 'http://mojepanstwo.pl/files/dzielnice_administracyjne.kml';
    var kmlOptions = {
        suppressInfoWindows: true,
        preserveViewport: false,
        map: map
    };

    var kmlLayer = new google.maps.KmlLayer(kmlUrl, kmlOptions);
    console.log(kmlLayer);

    google.maps.event.addListener(kmlLayer, 'click', function (kmlEvent) {
        var text = kmlEvent.featureData;
        console.log(text);
    });

}

google.maps.event.addDomListener(window, 'load', initialize);