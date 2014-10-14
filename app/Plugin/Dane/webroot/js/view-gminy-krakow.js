$(function () {
    var data = [
        {
            "code": "I",
            "value": 728
        },
        {
            "code": "II",
            "value": 710
        },
        {
            "code": "III",
            "value": 963
        },
        {
            "code": "IV",
            "value": 541
        },
        {
            "code": "V",
            "value": 622
        },
        {
            "code": "VI",
            "value": 866
        },
        {
            "code": "VII",
            "value": 398
        },
        {
            "code": "VIII",
            "value": 785
        },
        {
            "code": "IX",
            "value": 223
        },
        {
            "code": "X",
            "value": 605
        },
        {
            "code": "XI",
            "value": 361
        },
        {
            "code": "XII",
            "value": 237
        },
        {
            "code": "XIII",
            "value": 157
        }
    ];

    $.getJSON('/files/krakow-dzielnice.geo.json', function (jsonData) {
        console.log(jsonData);

        $('#dzielnice_map').highcharts('Map', {
            title: {
                text: false
            },

            credits: {
                enabled: false
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'top'
                }
            },

            colorAxis: {},

            series: [{
                data: data,
                mapData: jsonData,
                joinBy: ['Name', 'code'],
                name: false,
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.properties.Description}'
                }
            }]
        });
    });
});