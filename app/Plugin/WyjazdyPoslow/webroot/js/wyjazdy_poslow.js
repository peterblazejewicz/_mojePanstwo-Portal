$(function () {
    $.getJSON('/WyjazdyPoslow/files/world-highres.geo.json', function (geojson) {

        // Prepare the geojson
        var states = Highcharts.geojson(geojson, 'map'),
            rivers = Highcharts.geojson(geojson, 'mapline'),
            cities = Highcharts.geojson(geojson, 'mappoint');

        // Initiate the chart
        $('#wyjazdyPoslowMap').highcharts('Map', {
            title: {
                text: ' '
            },

            chart: {
                backgroundColor: '#f3f3f3'
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            credits: {
                enabled: false
            },

            legend: {
                enabled: false
            },

            series: [{
                data: states,

                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{point.name}'
                }
            }, {
                name: '',
                type: 'mapline',
                data: rivers,
                color: Highcharts.getOptions().colors[0],
                tooltip: {
                    enabled: false
                }
            }, {
                name: 'Miasta',
                type: 'mappoint',
                data: cities,
                color: 'black',
                marker: {
                    radius: 2
                },
                dataLabels: {
                    align: 'left',
                    verticalAlign: 'middle'
                },
                animation: false,
                tooltip: {
                    pointFormat: '{point.name}'
                }
            }]
        });
    });
});