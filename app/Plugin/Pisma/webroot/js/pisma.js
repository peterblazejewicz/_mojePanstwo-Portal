var PISMA = Class.extend({
    html: {
        stepper_div: $("#stepper")
    },
    methods: {
        stepper: null
    },
    init: function () {
        this.steps();
    },
    steps: function () {
        this.methods.stepper = this.html.stepper_div.steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            enableAllSteps: true,
            enableKeyNavigation: false,
            enablePagination: true,
            suppressPaginationOnFocus: false,
            enableCancelButton: false,
            enableFinishButton: false,
            saveState: true,
            labels: {
                finish: "Zakończ",
                next: "Następny",
                previous: "Poprzedni",
                loading: "Ładowanie..."
            }
        });
    }
});

var $P;

$(document).ready(function () {
    $P = new PISMA();

    /*Source: https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg*/
    var editor = $('#editor');

    if (editor.length) {
        editor.wysihtml5({
            toolbar: {
                "lists": true,
                "image": false
            },
            locale: 'pl-PL'
        });
        editor.removeClass('loading');
    }
});