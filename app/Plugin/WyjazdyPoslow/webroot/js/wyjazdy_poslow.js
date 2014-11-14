$(function () {
    $.getJSON('/WyjazdyPoslow/files/world-highres.geo.json', function (geojson) {

        // Prepare the geojson
        var mapData = Highcharts.geojson(geojson, 'map'),
            rivers = Highcharts.geojson(geojson, 'mapline'),
            cities = Highcharts.geojson(geojson, 'mappoint'),
            $wyjazdyPoslowMap = $('#wyjazdyPoslowMap'),
            $detailInfo;

        $.getJSON('http://mojepanstwo.pl:4444/wyjazdyposlow/world', function (statsData) {
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
                    backgroundColor: '#f3f3f3'
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
                    maxColor: '#009de0'
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
                                    $detailInfo.find('.detailInfoClose').click(function () {
                                        $detailInfo.remove();
                                        $wyjazdyPoslowMap.find('.detailInfoBackground').remove();
                                    });
                                } else {
                                    $detailInfo.find('.content').empty()
                                }

                                $.getJSON('http://mojepanstwo.pl:4444/wyjazdyposlow/countryDetails/' + e.point.code.toLowerCase(), function (detail) {
                                    $detailInfo.find('.content').removeClass('loading').append(
                                        $('<div></div>').addClass('row').append(
                                            $('<div></div>').addClass('ilosc col-xs-6').html("Ilość&nbsp;wyjazdów:&nbsp;<b>" + e.point.ilosc_wyjazdow + "</b>")
                                        ).append(
                                            $('<div></div>').addClass('koszt col-xs-6').html("Łączna&nbsp;kwota:&nbsp;<b>" + e.point.laczna_kwota + "</b>")
                                        )
                                    );

                                    $.each(detail, function () {
                                        var that = this;

                                        $detailInfo.find('.content').append(
                                            $('<div></div>').append(
                                                $('<div></div>').addClass('wyjazdName col-xs-12 row').text(that.delegacja)
                                            ).append(
                                                $('<table></table>').addClass('table table-condensed col-xs-12').append(
                                                    $('<thead></thead>').append(
                                                        $('<td>').text('Posel')
                                                    ).append(
                                                        $('<td>').text('Koszt końcowy')
                                                    ).append(
                                                        $('<td>').text('Transport')
                                                    ).append(
                                                        $('<td>').text('Dieta')
                                                    ).append(
                                                        $('<td>').text('Hotel')
                                                    ).append(
                                                        $('<td>').text('Dojazd')
                                                    ).append(
                                                        $('<td>').text('Ubezpieczenie')
                                                    ).append(
                                                        $('<td>').text('Fundusz')
                                                    ).append(
                                                        $('<td>').text('Kurs')
                                                    ).append(
                                                        $('<td>').text('Zaliczka')
                                                    )
                                                )
                                            )
                                        );
                                        $.each(that.poslowie, function () {
                                            $detailInfo.find('table:last').append(
                                                $('<tr></tr>').append(
                                                    $('<td></td>').text(this.posel + ' (' + this.klub_skrot + ')')
                                                ).append(
                                                    $('<td></td>').text(this.koszt_suma)
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
                                                )
                                            )
                                        })
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
});