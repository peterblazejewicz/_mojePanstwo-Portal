var PISMA = Class.extend({
        html: {
            stepper_div: $("#stepper")
        },
        methods: {
            stepper: null,
            szablon: null,
            editor: null
        },
        init: function () {
            this.steps();
            this.stepsMarkers();

            this.szablon();
            this.adresaci();
            this.editor();
        },
        stepsMarkers: function () {
            this.html.szablony = this.html.stepper_div.find('.szablony');
            this.html.adresaci = this.html.stepper_div.find('.adresaci');
            this.html.editorTop = this.html.stepper_div.find('.editor-controls');
            this.html.editor = this.html.stepper_div.find('#editor');
        },
        steps: function () {
            var self = this;

            self.html.stepper_div.steps({
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
                    next: "Dalej",
                    previous: "Cofnij",
                    loading: "Ładowanie..."
                },
                onStepChanged: function () {
                    self.stepsCheck();
                }
            });

            self.methods.stepper = self.html.stepper_div.data();
        },
        szablon: function () {
            var self = this;

            self.html.szablony.find('#chosen-template .btn-danger').click(function () {
                self.html.szablony.find('#chosen-template').slideUp(function () {
                    self.szablonReset(self);
                });
            });
            self.html.szablony.find('.ul-raw li .btn').click(function () {
                var that = $(this),
                    slice = that.parents('li');

                if (that.hasClass('btn-success')) {
                    self.szablonReset(self);

                    that.removeClass('btn-success').addClass('btn-default disabled');
                    self.methods.szablon = {
                        id: slice.data('id'),
                        title: slice.data('title')
                    };
                    self.html.editorTop.find('.control-template').text(self.methods.szablon.title);

                    self.html.szablony.find('#chosen-template ul').empty().append(
                        $('<li></li>').addClass('row').append(
                            $('<div></div>').append(
                                $('<p></p>').text(self.methods.szablon.title)
                            )
                        )
                    );

                    if (self.html.szablony.find('#chosen-template').is(':hidden'))
                        self.html.szablony.find('#chosen-template').slideDown();
                }
            });
        },
        szablonReset: function (self) {
            self.html.szablony.find('.ul-raw .btn-default').removeClass('btn-default disabled').addClass('btn-success');
            self.methods.szablon = null;
        },
        adresaci: function () {
            var self = this;

            self.html.adresaci.find('#chosen-addressee .btn-danger').click(function () {
                self.html.adresaci.find('#chosen-addressee').slideUp(function () {
                    self.adresaciReset(self);
                });
            });

            $.getJSON("http://api.mojepanstwo.pl/dane/dataset/instytucje/search.json?conditions[q]=%22ministerstwo%22", function (data) {
                self.html.adresaci.find('.content').empty().append(
                    $('<ul></ul>').addClass('ul-raw')
                ).show();

                $.each(data.search.dataobjects, function () {
                    var that = this;

                    self.html.adresaci.find('.ul-raw').append(
                        $('<li></li>').addClass('row').data({
                            id: that.id,
                            title: that.data['instytucje.nazwa'],
                            adres: that.data['instytucje.adres_str']
                        }).append(
                            $('<div></div>').addClass('pull-left').append(
                                $('<p>').append(
                                    $('<a></a>').attr('href', that._mpurl).text(that.data['instytucje.nazwa'])
                                )
                            )
                        ).append(
                            $('<div></div>').addClass('pull-right').append(
                                $('<button></button>').addClass('btn btn-success btn-xs').text('Wybierz').click(function () {
                                    var that = $(this),
                                        slice = that.parents('li');

                                    if (that.hasClass('btn-success')) {
                                        self.adresaciReset(self);

                                        that.removeClass('btn-success').addClass('btn-default disabled');
                                        self.methods.adresaci = {
                                            id: slice.data('id'),
                                            title: slice.data('title'),
                                            adres: slice.data('adres')
                                        };
                                        self.html.editorTop.find('.control-addressee').empty().append(
                                            $('<p></p>').text(self.methods.adresaci.title)
                                        ).append(
                                            $('<p></p>').text(self.methods.adresaci.adres)
                                        );

                                        self.html.adresaci.find('#chosen-addressee ul').empty().append(
                                            $('<li></li>').addClass('row').append(
                                                $('<div></div>').append(
                                                    $('<p></p>').text(self.methods.adresaci.title)
                                                )
                                            )
                                        );

                                        if (self.html.adresaci.find('#chosen-addressee').is(':hidden'))
                                            self.html.adresaci.find('#chosen-addressee').slideDown();
                                    }
                                })
                            )
                        )
                    );
                });
            });
        },
        adresaciReset: function (self) {
            self.html.adresaci.find('.ul-raw .btn-default').removeClass('btn-default disabled').addClass('btn-success');
            self.methods.adresaci = null;
        },
        editor: function () {
            var self = this;

            self.html.editorTop.find('.control-addressee').click(function () {
                self.html.stepper_div.steps("previous");
            }).end()
                .find('.control-template').click(function () {
                    self.html.stepper_div.steps("previous");
                    self.html.stepper_div.steps("previous");
                });

            var months = ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];
            var uDatepicker = $.datepicker._updateDatepicker;
            $.datepicker._updateDatepicker = function () {
                var ret = uDatepicker.apply(this, arguments);
                var $sel = this.dpDiv.find('select');
                $sel.find('option').each(function (i) {
                    $(this).text(months[i]);
                });
                return ret;
            };
            $.datepicker.regional['pl'] = {
                closeText: 'Zamknij',
                prevText: '&#x3c;Poprzedni',
                nextText: 'Następny&#x3e;',
                currentText: 'Dzień',
                changeMonth: true,
                monthNames: ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca',
                    'lipca', 'sierpnia', 'wrzesienia', 'października', 'listopada', 'grudnia'],
                monthNamesShort: ['Sty', 'Lu', 'Mar', 'Kw', 'Maj', 'Cze',
                    'Lip', 'Sie', 'Wrz', 'Pa', 'Lis', 'Gru'],
                dayNames: ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'],
                dayNamesShort: ['Nie', 'Pn', 'Wt', 'År', 'Czw', 'Pt', 'So'],
                dayNamesMin: ['N', 'Pn', 'Wt', 'År', 'Cz', 'Pt', 'So'],
                weekHeader: 'Tydz',
                dateFormat: 'd MM yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['pl'])
            self.html.editorTop.find('.control-date').datepicker();

            if (self.html.editor.length) {
                self.html.editor.wysihtml5({
                    toolbar: {
                        "image": false,
                        "textAlign": true
                    },
                    "fa": true,
                    locale: 'pl-PL'
                });
                self.html.editor.removeClass('loading');
                self.html.stepper_div.find('.wysihtml5-toolbar').find('[data-wysihtml5-command="bold"]').html($('<span></span>').addClass('fa fa-bold'))
                    .end()
                    .find('[data-wysihtml5-command="italic"]').html($('<span></span>').addClass('fa fa-italic'))
                    .end()
                    .find('[data-wysihtml5-command="underline"]').html($('<span></span>').addClass('fa fa-underline'))
                    .end()
                    .find('[data-wysihtml5-command="createLink"]').html($('<span></span>').addClass('glyphicon glyphicon-link'));
            }
        },
        editorDetail: function () {
            var self = this;

            if (self.methods.editor == null || (self.methods.editor.szablon != self.methods.szablon.id)) {
                $.getJSON("/pisma/szablony/" + self.methods.szablon.id + ".json", function (data) {
                    self.methods.editor = {
                        id: data.id,
                        tytul: data.tytul,
                        text: data.formula_start
                    };
                    self.html.editorTop.find('.control-template').text(self.methods.editor.tytul);
                    self.html.editor.empty().append($('<p></p>').text(self.methods.editor.text));
                });
            }
        }
    })
    ;

var $P;

$(document).ready(function () {
    $P = new PISMA();
});