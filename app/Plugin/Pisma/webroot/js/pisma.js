var PISMA = Class.extend({
    init: function () {

        this.stepper_div = $("#stepper");

        this.stepper = this.stepper_div.steps({
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
            saveState: true
        });

    }
});

var $P;

$(document).ready(function () {
    var editor = $('#editor');

    $P = new PISMA();
    if (editor.length)
        editor.wysiwyg();
});