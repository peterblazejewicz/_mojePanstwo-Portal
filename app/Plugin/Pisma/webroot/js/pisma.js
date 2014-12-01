var PISMA = Class.extend({
    html: {
        stepper_div: $("#stepper")
    },
    methods: {
        stepper: null
    },
    objects: {
        starter: null,
        szablon: null,
        adresaci: null,
        editor: null
    },
    cache: {
        adresaci: {}
    },
    init: function () {
        if (this.html.stepper_div.length) {
            this.steps();
            this.stepsMarkers();

            this.checkStep();

            this.szablon();
            this.adresaci();
            this.editor();
        }
    },
    stepsMarkers: function () {
        this.html.szablony = this.html.stepper_div.find('.szablony');
        this.html.adresaci = this.html.stepper_div.find('.adresaci');
        this.html.editorTop = this.html.stepper_div.find('.editor-controls');
        this.html.editor = this.html.stepper_div.find('#editor');
        this.html.finalForm = this.html.stepper_div.find('#finalForm');
        this.objects.starter = this.html.stepper_div.data('pismo');
    },
    steps: function () {
        var self = this;

        self.methods.stepper = self.html.stepper_div.steps({
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
            onInit: function () {
                self.html.stepper_div.find('ul[role="tablist"]').addClass('container');
            },
            onStepChanged: function () {
                self.checkStep();
            }
        });
    },
    checkStep: function () {
        if (this.methods.stepper.data().state.currentIndex == 2) {
            this.editorDetail();
        } else if (this.methods.stepper.data().state.currentIndex == 3) {
            this.lastPage();
        }
    },
    szablon: function () {
        var self = this;

        self.html.szablony.find('#chosen-template .btn-danger').click(function () {
            self.html.szablony.find('#chosen-template').slideUp(function () {
                self.szablonReset(self);
            });
        });
        self.html.szablony.find('.list .ul-raw li .title a').click(function (e) {
            var parent = $(this).parents('li');
            e.preventDefault();

            parent.find('.desc').stop(true, false).slideToggle();

        });
        self.html.szablony.find('.list .ul-raw li .btn').click(function () {
            var that = $(this),
                slice = that.parents('li');

            if (that.hasClass('btn-success')) {
                self.szablonReset(self);

                that.removeClass('btn-success').addClass('btn-default disabled');
                self.objects.szablon = {
                    id: slice.data('id'),
                    title: slice.data('title')
                };
                self.html.editorTop.find('.control-template').text(self.objects.szablon.title);

                self.html.szablony.find('#chosen-template ul').empty().append(
                    $('<li></li>').addClass('row').append(
                        $('<div></div>').append(
                            $('<p></p>').text(self.objects.szablon.title)
                        )
                    )
                );

                if (self.html.szablony.find('#chosen-template').is(':hidden'))
                    self.html.szablony.find('#chosen-template').slideDown();

                self.methods.stepper.steps("next");
            }
        });
        if (self.objects.starter.szablon_id) {
            var choosen = self.html.szablony.find('.list .ul-raw li[data-id="' + self.objects.starter.szablon_id + '"]');

            choosen.find('.btn').removeClass('btn-success').addClass('btn-default disabled');
            self.objects.szablon = {
                id: choosen.data('id'),
                title: choosen.data('title')
            };
            self.html.editorTop.find('.control-template').text(self.objects.szablon.title);

            self.html.szablony.find('#chosen-template ul').empty().append(
                $('<li></li>').addClass('row').append(
                    $('<div></div>').append(
                        $('<p></p>').text(self.objects.szablon.title)
                    )
                )
            );

            if (self.html.szablony.find('#chosen-template').is(':hidden'))
                self.html.szablony.find('#chosen-template').slideDown();
        }
    },
    szablonReset: function (self) {
        self.html.szablony.find('.list .ul-raw .btn-default').removeClass('btn-default disabled').addClass('btn-success');
        self.objects.szablon = null;
    },
    adresaci: function () {
        var self = this;

        self.html.adresaci.find('#chosen-addressee .btn-danger').click(function () {
            self.html.adresaci.find('#chosen-addressee').slideUp(function () {
                self.adresaciReset(self);
            });
        });
        self.html.adresaci.find('.search').on('keyup', function () {
            var adresat = $(this).val();

            if (adresat in self.cache.adresaci) {
                self.adresaciList(self.cache.adresaci[adresat]);
            } else {
                $.getJSON("http://api.mojepanstwo.pl/dane/dataset/instytucje/search.json?conditions[q]=" + adresat, function (data) {
                    self.cache.adresaci[adresat] = data;
                    self.adresaciList(data);
                });
            }
        });

        if (self.objects.starter.adresat_id) {
            $.getJSON("http://api.mojepanstwo.pl/dane/instytucje/" + self.objects.starter.adresat_id + ".json", function (d) {
                self.objects.adresaci = {
                    id: d.object.id,
                    title: d.object.data['instytucje.nazwa'],
                    adres: d.object.data['instytucje.adres']
                };

                self.html.editorTop.find('.control-addressee').empty().append(
                    $('<p></p>').text(self.objects.adresaci.title)
                ).append(
                    $('<p></p>').text(self.objects.adresaci.adres)
                );

                self.html.adresaci.find('#chosen-addressee ul').empty().append(
                    $('<li></li>').addClass('row').append(
                        $('<div></div>').append(
                            $('<p></p>').text(self.objects.adresaci.title)
                        )
                    )
                );

                if (self.html.adresaci.find('#chosen-addressee').is(':hidden'))
                    self.html.adresaci.find('#chosen-addressee').slideDown();

            });
        }
    },
    adresaciList: function (data) {
        var self = this;

        self.html.adresaci.find('.list').empty().append(
            $('<ul></ul>').addClass('ul-raw')
        ).show();

        if (data.search.dataobjects.length) {
            $.each(data.search.dataobjects, function () {
                var that = this;

                self.html.adresaci.find('.list .ul-raw').append(
                    $('<li></li>').addClass('row').data({
                        id: that.id,
                        title: that.data['instytucje.nazwa'],
                        adres: that.data['instytucje.adres_str']
                    }).append(
                        $('<div></div>').addClass('pull-left col-md-11').append(
                            $('<p>').append(
                                $('<a></a>').attr('href', that._mpurl).text(that.data['instytucje.nazwa'])
                            )
                        )
                    ).append(
                        $('<div></div>').addClass('pull-right col-md-1').append(
                            $('<button></button>').addClass('btn btn-success btn-xs').text('Wybierz').click(function () {
                                var that = $(this),
                                    slice = that.parents('li');

                                if (that.hasClass('btn-success')) {
                                    self.adresaciReset(self);

                                    that.removeClass('btn-success').addClass('btn-default disabled');
                                    self.objects.adresaci = {
                                        id: slice.data('id'),
                                        title: slice.data('title'),
                                        adres: slice.data('adres')
                                    };
                                    self.html.editorTop.find('.control-addressee').empty().append(
                                        $('<p></p>').text(self.objects.adresaci.title)
                                    ).append(
                                        $('<p></p>').text(self.objects.adresaci.adres)
                                    );

                                    self.html.adresaci.find('#chosen-addressee ul').empty().append(
                                        $('<li></li>').addClass('row').append(
                                            $('<div></div>').append(
                                                $('<p></p>').text(self.objects.adresaci.title)
                                            )
                                        )
                                    );

                                    if (self.html.adresaci.find('#chosen-addressee').is(':hidden'))
                                        self.html.adresaci.find('#chosen-addressee').slideDown();
                                }

                                self.methods.stepper.steps("next");
                            })
                        )
                    )
                );
            });
        } else {
            self.html.adresaci.find('.list .ul-raw').append(
                $('<li></li>').addClass('row').append(
                    $('<p></p>').addClass('col-md-12').text('Brak wyników dla szukanej frazy')
                )
            )
        }
    },
    adresaciReset: function (self) {
        self.html.adresaci.find('.list .ul-raw .btn-default').removeClass('btn-default disabled').addClass('btn-success');
        self.objects.adresaci = null;
    },
    editor: function () {
        var self = this;

        $('textarea').autosize({
            append: false
        }).keyup(function () {
            var that = $(this);

            (that.val() == "") ? that.addClass('empty') : that.removeClass('empty');
        });

        self.html.editorTop.find('.control-addressee').click(function () {
            self.methods.stepper.steps("previous");
        }).end()
            .find('.control-template').click(function () {
                self.methods.stepper.steps("previous");
                self.methods.stepper.steps("previous");
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
            dayNamesShort: ['Nie', 'Pn', 'Wt', 'Śr', 'Czw', 'Pt', 'So'],
            dayNamesMin: ['N', 'Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So'],
            weekHeader: 'Tydz',
            dateFormat: 'd MM yy',
            altField: '#datepickerAlt',
            altFormat: "yy-mm-dd",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['pl']);

        var myDate = new Date();
        var prettyDate = myDate.getDate() + ' ' + $.datepicker.regional['pl'].monthNames[myDate.getMonth()] + ' ' + myDate.getFullYear();

        self.html.editorTop.find('.control-date .datepicker').val(prettyDate).datepicker();

        if (self.html.editor.length) {
            self.html.editor.wysihtml5({
                toolbar: {
                    "image": false,
                    "emSmall": false
                },
                "fa": true,
                locale: 'pl-PL'
            });
            self.html.editor.removeClass('loading');
            self.html.stepper_div.find('.wysihtml5-toolbar').find('[data-wysihtml5-command="bold"]').html($('<span></span>').addClass('fa fa-bold'))
                .end()
                .find('[data-wysihtml5-command="italic"]').html($('<span></span>').addClass('fa fa-italic'))
                .end()
                .find('[data-wysihtml5-command="small"]').remove()
                .end()
                .find('[data-wysihtml5-command="underline"]').html($('<span></span>').addClass('fa fa-underline'))
                .end()
                .find('[data-wysihtml5-command="createLink"]').html($('<span></span>').addClass('glyphicon glyphicon-link'));
        }
    },
    editorDetail: function () {
        var self = this;

        if (self.objects.szablon != null && (self.objects.editor == null || (self.objects.editor.szablon != self.objects.szablon.id))) {
            $.getJSON("/pisma/szablony/" + self.objects.szablon.id + ".json", function (data) {
                if (self.objects.editor !== null) {
                    if ((self.objects.editor.text === self.html.editor.text()) || (self.html.editor.text() == ''))
                        self.html.editor.empty().html(data.tresc);
                } else {
                    self.html.editor.empty().html(data.tresc);
                }
                self.html.editorTop.find('.control-template').text(data.nazwa);

                self.objects.editor = {
                    id: data.id,
                    tytul: data.nazwa,
                    text: data.tresc
                };
            });
        }

        self.html.editor.focus();
    },
    lastPage: function () {
        var self = this,
            prev = self.html.stepper_div.find('.edit .col-md-10').clone();

        /*CLEAN UP*/
        prev.find('.wysihtml5-toolbar').remove()
            .end()
            .find('.control span.empty').remove()
            .end()
            .find('.control .empty').removeClass('empty')
            .end()
            .find('.control input, .control textarea').attr('disabled', 'disabled')
            .end()
            .find('#editor').attr('contenteditable', false);

        self.html.stepper_div.find('.preview .previewRender .col-md-10').remove();
        self.html.stepper_div.find('.preview .previewRender').prepend(prev);

        /*COPY TEXTAREA VALUE*/
        if (prev.find('.control.control-date input.city').val() == '')
            prev.find('.control.control-date input.city').val(' ');

        self.html.stepper_div.find('.edit .col-md-10').find("textarea:not('.hide')").each(function (idx) {
            $(self.html.stepper_div.find('.preview .previewRender').find("textarea").eq(idx)).replaceWith('<div class="pre">' + $(this).val().replace(/\n/g, '<br/>') + '</div>');
        });

        self.html.finalForm.find('input[name="data_pisma"]').val(prev.find('.control.control-date input#datepickerAlt').val())
            .end()
            .find('input[name="miejscowosc"]').val(prev.find('.control.control-date input.city').val())
            .end()
            .find('textarea[name="nadawca"]').val(self.html.stepper_div.find('.edit .col-md-10 .control.control-sender textarea.nadawca').val())
            .end()
            .find('input[name="adresat_id"]').val((self.objects.adresaci) ? self.objects.adresaci.id : '')
            .end()
            .find('input[name="adresat"]').val(prev.find('.control.control-addressee').html())
            .end()
            .find('input[name="szablon_id"]').val((self.objects.szablon) ? self.objects.szablon.id : '')
            .end()
            .find('input[name="tytul"]').val(prev.find('.control.control-template').text())
            .end()
            .find('input[name="tresc"]').val(prev.find('#editor').html())
            .end()
            .find('textarea[name="podpis"]').val(self.html.stepper_div.find('.edit .col-md-10 .control.control-signature textarea.podpis').val());
    }
});

var $P;

$(document).ready(function () {
    $P = new PISMA();
});