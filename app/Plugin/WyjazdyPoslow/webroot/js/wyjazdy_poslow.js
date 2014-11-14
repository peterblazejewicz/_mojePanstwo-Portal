$(function () {
    $.getJSON('/WyjazdyPoslow/files/world-highres.geo.json', function (geojson) {

        // Prepare the geojson
        var mapData = Highcharts.geojson(geojson, 'map'),
            rivers = Highcharts.geojson(geojson, 'mapline'),
            cities = Highcharts.geojson(geojson, 'mappoint'),
            $wyjazdyPoslowMap = $('#wyjazdyPoslowMap'),
            $detailInfo;

        // Initiate the chart
        $wyjazdyPoslowMap.highcharts('Map', {
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
                },
                enableMouseWheelZoom: false
            },

            credits: {
                enabled: false
            },

            legend: {
                enabled: false
            },

            series: [{
                data: mapData,
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{point.name}'
                },
                events: {
                    click: function (e) {
                        if (e.point) {
                            if ($wyjazdyPoslowMap.find('.detailInfo').length == 0) {
                                $detailInfo = $('<div></div>').addClass('detailInfo').append($('<span></span>').addClass('detailInfoClose glyphicon glyphicon-remove')).append($('<div></div>').addClass('content'));
                                $wyjazdyPoslowMap.append($detailInfo);
                                $detailInfo.find('.detailInfoClose').click(function () {
                                    $detailInfo.remove();
                                });
                            }

                            $detailInfo.css({
                                left: e.pageX - $wyjazdyPoslowMap.offset().left + 20,
                                top: e.pageY - $wyjazdyPoslowMap.offset().top + 10
                            }).find('.content').html(e.point.name);
                        }
                    }
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