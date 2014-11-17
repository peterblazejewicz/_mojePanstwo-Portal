$(function () {
    $.getJSON('/WyjazdyPoslow/files/world-highres.gf.geo.json', function (geojson) {

        // Prepare the geojson
        var mapData = Highcharts.geojson(geojson, 'map'),
            rivers = Highcharts.geojson(geojson, 'mapline'),
            cities = Highcharts.geojson(geojson, 'mappoint'),
            $wyjazdyPoslowMap = $('#wyjazdyPoslowMap'),
            $detailInfo;

        $.getJSON('http://api.mojepanstwo.pl/wyjazdyposlow/world', function (statsData) {
            $.each(statsData, function () {
                this.value = this.ilosc_wyjazdow;
                this.laczna_kwota = this.laczna_kwota.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1 ')
            });

            // Initiate the chart
            $wyjazdyPoslowMap.highcharts('Map', {
                title: {
                    text: ' '
                },

                chart: {
                    backgroundColor: {
	                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                    stops: [
	                        [0, '#2C333C'],
	                        [1, '#697078']
	                    ]
                    },
                    borderColor: '#333',
                    spacing: [0,0,0,0],
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    },
                    enableMouseWheelZoom: false
                },

                colorAxis: {
                    min: 1,
                    minColor: '#EEEEFF',
                    maxColor: '#006df0'
                },

                credits: {
                    enabled: false
                },

                legend: {
                    enabled: false
                },

                series: [{
                    data: statsData,
                    mapData: mapData,
                    joinBy: ['iso-a2', 'code'],
                    dataLabels: {
                        enabled: false
                    },
                    tooltip: {
                        headerFormat: '',
                        pointFormat: '<h3>{point.kraj}</h3><br>Ilość wyjazdów: <b>{point.ilosc_wyjazdow}</b><br/>Łączna kwota: <b>{point.laczna_kwota}</b>'
                    },
                    events: {
                        click: function (e) {
                            if (e.point) {
                                if ($wyjazdyPoslowMap.find('.detailInfo').length == 0) {
                                    $detailInfo = $('<div></div>').addClass('detailInfo').append(
                                        $('<span></span>').addClass('detailInfoClose glyphicon glyphicon-remove')
                                    ).append(
                                        $('<div></div>').addClass('content loading')
                                    );
                                    $wyjazdyPoslowMap.append($('<div></div>').addClass('detailInfoBackground'));
                                    $wyjazdyPoslowMap.append($detailInfo);
                                    $wyjazdyPoslowMap.find('.detailInfoClose, .detailInfoBackground').click(function () {
                                        $detailInfo.remove();
                                        $wyjazdyPoslowMap.find('.detailInfoBackground').remove();
                                    });
                                } else {
                                    $detailInfo.find('.content').empty()
                                }

                                $.getJSON('http://api.mojepanstwo.pl/wyjazdyposlow/countryDetails/' + e.point.code.toLowerCase(), function (detail) {
                                    $detailInfo.find('.content').removeClass('loading').append(
                                        $('<div></div>').addClass('row').append(
                                            $('<div></div>').addClass('ilosc col-xs-4').html("Państwo:&nbsp;<b>" + e.point.kraj + "</b>")
                                        ).append(
                                            $('<div></div>').addClass('ilosc col-xs-4').html("Ilość&nbsp;wyjazdów:&nbsp;<b>" + e.point.ilosc_wyjazdow + "</b>")
                                        ).append(
                                            $('<div></div>').addClass('koszt col-xs-4').html("Łączna&nbsp;kwota:&nbsp;<b>" + e.point.laczna_kwota + "</b>")
                                        )
                                    );

                                    $.each(detail, function () {
                                        var that = this;

                                        $detailInfo.find('.content').append(
                                            $('<div></div>').addClass('slice').append(
                                                $('<div></div>').addClass('nazwa col-xs-12 row').html("Delegacja:&nbsp;<b>" + that.delegacja + "<b>")
                                            ).append(
                                                $('<table></table>').addClass('table table-condensed col-xs-12').append(
                                                    $('<thead></thead>').append(
                                                        $('<td>').text('Nazwa i skład delegacji')
                                                    ).append(
                                                        $('<td>').html('Koszt<br>transportu')
                                                    ).append(
                                                        $('<td>').html('Koszt<br>diety')
                                                    ).append(
                                                        $('<td>').html('Koszt<br>hoteli')
                                                    ).append(
                                                        $('<td>').html('Dojazdy')
                                                    ).append(
                                                        $('<td>').html('Ubezpieczenie')
                                                    ).append(
                                                        $('<td>').html('Wydatkowany<br>fundusz')
                                                    ).append(
                                                        $('<td>').html('Różnice<br>kursowe')
                                                    ).append(
                                                        $('<td>').html('Nierozliczone<br>zaliczki')
                                                    ).append(
                                                        $('<td>').html('Łączny<br>koszt<br>wyjazdu')
                                                    )
                                                )
                                            )
                                        );

                                        if (that.miasto && that.miasto !== "?")
                                            $detailInfo.find('.content .slice:last').prepend(
                                                $('<div></div>').addClass('miasto col-xs-12 row').html('Miasto:&nbsp;<b>' + that.miasto + '</b>')
                                            );

                                        $.each(that.poslowie, function () {
                                            $detailInfo.find('table:last').append(
                                                $('<tr></tr>').append(
                                                    $('<td></td>').text(this.posel + ' (' + this.klub_skrot + ')')
                                                ).append(
                                                    $('<td></td>').text(this.koszt_transport)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_dieta)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_hotel)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_dojazd)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_ubezpieczenie)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_fundusz)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_kurs)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_zaliczki)
                                                ).append(
                                                    $('<td></td>').text(this.koszt_suma)
                                                )
                                            )
                                        });
                                    });
                                })

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

    var pieKlubowo = $('.pieChartKlubowo'),
        pieData = pieKlubowo.data('kluby');

    // Build the chart
    pieKlubowo.highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: 'Wyjazdy:<b>{point.ilosc}<br>Koszt:<b>{point.y}</b></b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            data: pieData
        }]
    });
});