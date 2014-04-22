/*global powiadomieniaModal*/

(function ($) {
    var dataContent = $('.dataContent'),
        newNotification = dataContent.find('.objects .powiadomienia'),
        checkTime = 3000,
        newNotificationIntervalMain,
        addNewPhrase,
        phraseContent,
        alertsButtons,
        tryNumbers = 4;

    function _changeMarkStatus(newNotify, mode) {
        $.ajax({
            type: "GET",
            url: '/powiadomienia/flagObjects.json?action=' + mode + '&id=' + newNotify.attr('gid'),
            beforeSend: function () {
                newNotify.find('.alertsButtons > input').addClass('disabled');
            },
            success: function (data) {
                /*MARK SEEN ELEMENT AS READED TO NOT TRIGGER FUNCTION AGAIN AT SAME ELEMENT*/
                if (data.status == "OK") {
                    if (mode == 'read') {
                        newNotify.removeClass('unreaded').addClass('readed');
                        newNotify.find('.alertsButtons .unread').hide();
                        newNotify.find('.alertsButtons .read').show();
                    } else {
                        newNotify.removeClass('readed').addClass('unreaded');
                        newNotify.find('.alertsButtons .read').hide();
                        newNotify.find('.alertsButtons .unread').show();
                    }

                    $.each(data.groups_alerts_counts, function () {
                        var badge = $('.keywords').find('li[data-id="' + this.group_id + '"]').find('.badge');

                        (Number(this.alerts_unread_count) == 0) ? badge.removeClass('nonzero') : badge.addClass('nonzero');
                        badge.text(Number(this.alerts_unread_count));
                    })
                }
            },
            error: function () {
                var dataCount = (newNotify.data('count')) ? newNotify.data('count') + 1 : 1;
                newNotify.data('count', dataCount);
                if (newNotify.data('count') > tryNumbers)
                    newNotify.addClass('readed');
            },
            complete: function () {
                newNotify.find('.alertsButtons > input').removeClass('disabled');
            }
        });
    }


    function addAlertsButtonEvent(dom) {
        $.each(dom, function () {
            dom.find('.alertsButtons > input').unbind().click(function () {
                var btn = $(this),
                    parent = btn.parents('.objectRender');

                if (btn.hasClass('disabled')) return;

                if (btn.hasClass('read')) {
                    _changeMarkStatus(parent, 'unread');
                } else {
                    _changeMarkStatus(parent, 'read');
                }
            });
        })
    }

    function optionsMarkAsRead() {
        if (newNotification.find('.objectRender').length > 0 && $('.additionalOptions .markReadAfterThreeSec input').is(':checked')) {
            newNotificationIntervalMain = setInterval(function () {
                $.each(newNotification.find('.objectRender:not(.readed)'), function () {
                    if (isElementVisibled(this)) {
                        /*RUN FUNCTION AT SEEN EACH ELEMENTS*/
                        _changeMarkStatus($(this), 'read');
                    }
                });

                /*IS ALL ELEMENTS ARE READED - STOP FUNCTION*/
                if (newNotification.find('.objectRender:not(.readed)').length == 0)
                    clearInterval(newNotificationIntervalMain);
            }, checkTime);
        }
    }

    function optionsMarkAllAsRead(button) {
        var parm = (button.data('groupid') != "") ? "&group_id=" + button.data('groupid') : "";

        $.ajax({
            url: "/powiadomienia/flagObjects.json?action=read" + parm,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                /*MARK SEEN ELEMENT AS READED TO NOT TRIGGER FUNCTION AGAIN AT SAME ELEMENT*/
                if (data.status == "OK") {
                    $('.dataContent .objectRender').addClass('readed');
                    $.each(data.groups_alerts_counts, function () {
                        var badge = $('.keywords').find('li[data-id="' + this.group_id + '"]').find('.badge');

                        (Number(this.alerts_unread_count) == 0) ? badge.removeClass('nonzero') : badge.addClass('nonzero');
                        badge.text(Number(this.alerts_unread_count));
                    })
                }
            },
            error: function () {
                var dataCount = (button.data('count')) ? button.data('count') + 1 : 1;
                button.data('count', dataCount);
                if (button.data('count') > tryNumbers) {
                    newNotification.find('.objectRender:not(.readed)').addClass('readed');
                } else {
                    optionsMarkAllAsRead(button);
                }
            }
        });
    }

    if ((addNewPhrase = $('#addPhraseModal')).length > 0) {
        var addNewPhraseSubmit = function () {
            var btn = addNewPhrase.find('.addNewPhrase .btn'),
                input = addNewPhrase.find('.addNewPhrase input');

            if (input.val().length >= 2) {
                $.ajax({
                    url: "/powiadomienia/phrases/add.json",
                    data: {
                        add: input.val()
                    },
                    type: "POST",
                    dataType: "JSON",
                    beforeSend: function () {
                        btn.addClass('loading');
                        addNewPhrase.find('.error').addClass('hide');
                    },
                    success: function (res) {
                        if (res == true) {
                            $('#addPhraseModal').modal('hide');
                            // TODO: dorobić odświerzanie samej warstwy z frazami, a nie przełodowanie całej strony
                            location.reload();
                        } else {
                            addNewPhrase.find('.error').removeClass('hide').text(_mPHeart.translation.LC_POWIADOMIENIA_JS_AJAX_ERROR);
                        }
                    },
                    complete: function () {
                        btn.removeClass('loading')
                    }
                });
            } else {
                addNewPhrase.find('.error').removeClass('hide').text(_mPHeart.translation.LC_POWIADOMIENIA_JS_PHRASE_AT_LEASE_2_CHARS);
            }
        };

        addNewPhrase.find('.addNewPhrase .btn').click(function () {
            if (!$(this).hasClass('loading')) {
                addNewPhraseSubmit();
            }
        });
        $('#addPhraseModal').on('shown.bs.modal', function () {
            $('.addNewPhrase input').val('').focus().keyup(function (e) {
                if (e.keyCode == '13') {
                    addNewPhraseSubmit();
                }
            });
        })
    }

    if ((phraseContent = $('#powiadomienia').find('.frazy')).length > 0) {
        phraseContent.find('.keywords ul li a.options').click(function (e) {
            var that = $(this),
                parent = that.parents('li'),
                modalBottom = $('<div></div>');

            e.preventDefault();

            modalBottom.addClass('modal-footer').append(
                    $('<button></button>').addClass('btn delete btn-danger pull-left').attr({'type': 'button'}).text('Usuń')
                ).append(
                    $('<button></button>').addClass('btn duplicate btn-info pull-left').attr({'type': 'button'}).text('Duplikuj')
                ).append(
                    $('<button></button>').addClass('btn save btn-primary pull-right').attr({'type': 'button'}).text('Zapisz')
                );

            /*DELETE*/
            modalBottom.find('.btn.delete').click(function () {
                if ($(this).hasClass('disabled')) return;

                $.ajax({
                    type: 'GET',
                    url: '/',
                    data: {
                        id: parent.data('id'),
                        action: 'delete'
                    },
                    dataType: 'JSON',
                    beforeSend: function () {
                        modalBottom.find('.btn').addClass('disabled');
                        modalBottom.find('.btn.delete').addClass('loading');
                    },
                    complete: function () { /*TODO: zamienic na success gdy beda juz AJAX REQUEST gotowe*/
                        powiadomieniaModal.modal.modal('toggle');
                    }
                })
            });

            /*DUPLICATE*/
            modalBottom.find('.btn.duplicate').click(function () {
                if ($(this).hasClass('disabled')) return;

                $.ajax({
                    type: 'GET',
                    url: '/',
                    data: {
                        id: parent.data('id'),
                        action: 'duplicate'
                    },
                    dataType: 'JSON',
                    beforeSend: function () {
                        modalBottom.find('.btn').addClass('disabled');
                        modalBottom.find('.btn.duplicate').addClass('loading');
                    },
                    complete: function () { /*TODO: zamienic na success gdy beda juz AJAX REQUEST gotowe*/
                        powiadomieniaModal.modal.modal('toggle');
                    }
                })
            });

            /*SAVE*/
            modalBottom.find('.btn.save').click(function () {
                if ($(this).hasClass('disabled')) return;

                $.ajax({
                    type: 'GET',
                    url: '/?' + modalBottom.find('form').serialize() + '&action=save',
                    dataType: 'JSON',
                    beforeSend: function () {
                        modalBottom.find('.btn').addClass('disabled');
                        modalBottom.find('.btn.save').addClass('loading');
                    },
                    complete: function () { /*TODO: zamienic na success gdy beda juz AJAX REQUEST gotowe*/
                        powiadomieniaModal.modal.modal('toggle');
                        parent.find('label a.wrap').text($.trim(powiadomieniaModal.modal.find('.modal-header textarea.modal-title').val()))
                    }
                })
            });
            powiadomieniaModal.init({
                footer: modalBottom,
                title: $.trim(parent.find('label a.wrap').text()),
                hiddenInput: {
                    'data[Dataobject][ids]': parent.data('id')
                },
                ajax: {
                    saveUrl: '/',
                    saveParm: {id: parent.data('id')},
                    additionalUrl: '/',
                    additionalParm: {id: parent.data('id')}
                }
            })
        });
    }


    if ($('.loadMoreContent').length) {
        var loadMoreContentIntervalRunable = true,
            loadMoreContent = $('.dataContent .loadMoreContent'),
            showData = $('.dataContent .powiadomienia'),
            loadMoreContentIntervalMain = null;

        loadMoreContentIntervalMain = setInterval(function () {
            if (isElementVisibled('.loadMoreContent') && loadMoreContentIntervalRunable) {
                var page = Number(loadMoreContent.data('currentpage')) + 1,
                    groupId = (loadMoreContent.data('groupid') !== '') ? '&groupid=' + Number(loadMoreContent.data('groupid')) : '',
                    mode = '&mode=' + Number(loadMoreContent.data('mode'));

                loadMoreContentIntervalRunable = false;

                $.ajax({
                    type: "GET",
                    url: "powiadomienia/powiadomienia.json?page=" + page + mode + groupId,
                    beforeSend: function () {
                        loadMoreContent.addClass('loading');
                    },
                    success: function (data) {
                        loadMoreContent.removeClass('loading');
                        if (data) {
                            loadMoreContent.data('currentpage', page);
                            showData.append(data);
                            addAlertsButtonEvent(showData);
                            loadMoreContentIntervalRunable = true;
                        } else {
                            clearInterval(loadMoreContentIntervalMain);
                            loadMoreContent.remove();
                        }
                    },
                    complete: function () {
                        loadMoreContent.removeClass('loading');
                    }
                });
            }

        }, 1500);
    }

    $('.additionalOptions .markReadAfterThreeSec').change(function () {
        if ($(this).find('input').is(':checked')) {
            optionsMarkAsRead();
        } else {
            clearInterval(newNotificationIntervalMain);
        }
    });

    $('.additionalOptions .markAllAsRead').click(function () {
        optionsMarkAllAsRead($(this));
    });

    optionsMarkAsRead();
    addAlertsButtonEvent($('.showResults .objectRender'));
}(jQuery));