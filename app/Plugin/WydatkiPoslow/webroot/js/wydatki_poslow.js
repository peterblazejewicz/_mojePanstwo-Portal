/*global TweenMax,TimelineMax,ScrollMagic*/
var infoController;

jQuery(function ($) {
    var
        $window = $(window),
        $html = $('html'),
        $body = $('body'),
        $htmlBody = $('html, body'),
        $header = $body.find('header'),

        $story = $('#storyLine'),
        $far = $story.find('.far'),
        $medium = $story.find('.medium'),
        $near = $story.find('.near'),

        minScreenWidth = 1204,
        screenWidth = ($body.innerWidth() < minScreenWidth) ? minScreenWidth : $body.innerWidth(),

        posMap,
        scrollDest = 0,
        duration = 1000,

        transformOrigin,
        center = $window.width() / 2 | 0,

        smallJump = '20%',
        keyMap = {
            33: '-100%', // pageUp
            34: '+100%', // pageDown
            35: 1 / 0, // end
            36: 0, // home
            37: '-' + smallJump, // left
            38: '-' + smallJump, // up
            39: '+' + smallJump, // right
            40: '+' + smallJump // down
        },
        keyThrottle = true,
        controller,
        lastCloudsOffset;

    $.easing.easeOutExpo = function (x, t, b, c, d) {
        return t === d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
    };

    function introAnimation() {
        var offset = $story.offset().left,
            sl = $window.scrollLeft(),
            value = sl - 2 * offset,
            sejmLoc = $medium.find('.scene.sejm .building').offset().left,
            base = $medium.find('.scene.intro .scrollHint'),
            poselPoslankaSize = 411,
            poselPoslankaSizeLimit = 110,
            poselPoslankaWalkStart = 40,
            poselWalkScale = .3,
            poslankaWalkScale = .15,
            poselPoslankaWalkBond = 106,
            poslanka = base.find('.poslankaBckgrnd'),
            posel = base.find('.poselBckgrnd');

        if (value < sejmLoc) {
            poslanka.css({
                left: (value * 1.4 < sejmLoc) ? value * 1.4 : (poslanka.offset().left > sejmLoc) ? value * 1.4 : poslanka.offset().left,
                bottom: (Math.floor(poselPoslankaWalkStart + value * poslankaWalkScale) < poselPoslankaWalkBond) ? Math.floor(poselPoslankaWalkStart + value * poslankaWalkScale) : poselPoslankaWalkBond,
                height: (poselPoslankaSize - value > poselPoslankaSizeLimit) ? (poselPoslankaSize - value) : poselPoslankaSizeLimit
            });
            posel.css({
                right: (value * .9 < sejmLoc) ? -value * .9 : (poslanka.offset().left > sejmLoc) ? -value * 0.9 : -sejmLoc,
                bottom: (Math.floor(poselPoslankaWalkStart + value * poselWalkScale) < poselPoslankaWalkBond) ? Math.floor(poselPoslankaWalkStart + value * poselWalkScale) : poselPoslankaWalkBond,
                height: (poselPoslankaSize - value > poselPoslankaSizeLimit) ? (poselPoslankaSize - value) : poselPoslankaSizeLimit
            });

            (poslanka.offset().left > sejmLoc) ? poslanka.css('visibility', 'hidden') : poslanka.css('visibility', 'visible');
            (posel.offset().left > sejmLoc) ? posel.css('visibility', 'hidden') : posel.css('visibility', 'visible');
        }
    }

    function calculateOffsets() {
        posMap = [];
        $medium.find('.scene').each(function () {
            posMap.push({
                elem: $(this),
                pos: $(this).prop('offsetLeft') - $window['width']() / 2 | 0
            });
        });
        posMap.sort(function (a, b) {
            return b.pos - a.pos;
        });
        $window.triggerHandler('scroll');
    }

    function repeatButton() {
        $medium.find('.scene.stats .options .repeat').click(function (e) {
            e.preventDefault();

            scrollTo(0);
            setTimeout(function () {
                onResize();
            }, 1050);
        });
    }

    function scrollTo(dest) {
        var obj = {}, multiplier, realStep,
            max = $story.find('.medium').outerWidth() - screenWidth;

        if (!$htmlBody.is(':animated')) {
            scrollDest = $window['scrollLeft']();
        }
        if (typeof dest === 'string') {
            multiplier = dest.indexOf('-') >= 0 ? -1 : 1;
            realStep = +smallJump || +String(smallJump).replace(/[^\d]/g, '') / 100 * screenWidth;
            dest = scrollDest + (dest.indexOf('%') >= 0 ? multiplier * realStep : +dest || 0);
        }
        scrollDest = Math.max(0, Math.min(max, dest));
        obj['scrollLeft'] = scrollDest;
        $htmlBody.stop(true).animate(obj, {
            duration: duration,
            easing: 'easeOutExpo',
            queue: false
        });
    }

    function keyHandler(e) {
        var keyCode = e.which || e.keyCode || e.originalEvent.keyCode;

        if (!keyThrottle) return undefined;

        keyThrottle = false;
        if (keyMap[keyCode] != null) {
            e.preventDefault();
            scrollTo(keyMap[keyCode]);
            setTimeout(function () {
                keyThrottle = true;
            }, 0);
        }
    }

    function tickHandler() {
        var offset = $story.offset().left,
            sl = $window.scrollLeft(),
            value = sl - 2 * offset;
        if (lastCloudsOffset !== value) {
            lastCloudsOffset = value;
            $far.find('.clouds').css('left', (value / 14300 * 3000) * 1.5 | 0);
        }
    }

    function onResize() {
        transformOrigin = center + 'px ' + center * 6 + 'px';

        if (controller) {
            controller.destroy();
        }

        /*SET SCREEN SIZE*/
        $medium.find('.scene:first, .scene.stats .screen').css('width', screenWidth);
        //$medium.find('.scene.stats').css('width', screenWidth * 2);
        $medium.find('.scene.stats').css('width', screenWidth);

        $far.find('.clouds').css('marginLeft', screenWidth);

        $story.css({'width': screenWidth, 'height': $body.innerHeight() - $header.outerHeight(true)});
        $story.find('.far, .medium, .near').css({'width': $medium.outerWidth(true)});

        infoController = controller = new ScrollMagic({
            vertical: false,
            loglevel: 2
        });

        /*SETTING POSITION OF ANIMATED ELEMENTS*/
        $near.find('.posel').removeClass('hide outfit').css({
            left: $medium.find('.scene.sejm').position().left + 600,
            height: "",
            bottom: ""
        });
        $near.find('.samochod').removeClass('in').css({left: $medium.find('.scene.sejm').position().left + 850});
        $near.find('.taxi').removeClass('in').css({
            left: $medium.find('.scene.tlumaczenia').position().left,
            opacity: 0
        });
        $near.find('.samolot').css({
            left: $medium.find('.scene.lotnisko').position().left + 215,
            bottom: "",
            transform: ""
        });

        /*SEJM POSEL*/
        var sejmPosel = new TimelineMax()
            .add(TweenMax.fromTo($medium.find('.scene.sejm .stat.wyplacane'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($medium.find('.scene.sejm .stat.pracownikow'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($medium.find('.scene.sejm .stat.zlecenia'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($near.find('.posel'), 3, {
                left: $medium.find('.scene.sejm').position().left + 600
            }, {left: $medium.find('.scene.sejm').position().left + 900}));


        new ScrollScene({
            duration: ($medium.find('.scene.sejm').width())
        }).on("end", function () {
                $medium.find('.scene.sejm .stat').addClass('out');
            })
            .triggerElement($medium.find('.scene.sejm'))
            .setTween(sejmPosel)
            .reverse(false)
            .addTo(controller);

        /*POSEL WALK - BIURO + INSIDE*/
        var biuroPosel = new TimelineMax()
            .add(TweenMax.to($near.find('.posel'), 0.5, {left: $medium.find('.scene.biuro').position().left + 390}))
            .add(TweenMax.fromTo($medium.find('.scene.biuro .stat.biura'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($medium.find('.scene.biuro .stat.konserwacje'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($medium.find('.scene.biuro .stat.naprawy'), 0.5, {opacity: 0}, {opacity: 1}));

        new ScrollScene({
            duration: $medium.find('.scene.biuro').width() * .7
        }).on("end", function () {
                $medium.find('.scene.biuro').find('.stat').addClass('out');
            })
            .triggerElement($medium.find('.scene.biuro'))
            .setTween(biuroPosel)
            .reverse(false)
            .addTo(controller);

        /*POSEL WALK - BIURO + SKLEP*/
        var biuroSklep = new TimelineMax()
            .add(TweenMax.to($near.find('.posel'), 2, {left: $medium.find('.scene.sklep').position().left + $medium.find('.scene.sklep').width() - 480}))
            .add(TweenMax.fromTo($medium.find('.scene.sklep .stat.materialy'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($medium.find('.scene.sklep .stat.srodki'), 0.5, {opacity: 0}, {opacity: 1}));

        new ScrollScene({
            duration: $medium.find('.scene.sklep').width() * .7
        }).on("end", function () {
                $medium.find('.scene.sklep').find('.stat').addClass('out');
            })
            .triggerElement($medium.find('.scene.biuro .marker'))
            .setTween(biuroSklep)
            .reverse(false)
            .addTo(controller);

        /*POSEL WALK - SKLEP, SZPITAL, BANK, SPOTKANIE*/
        var poselWalk = new TimelineMax()
            .add(TweenMax.fromTo($near.find('.posel'), 0.5, {left: $medium.find('.scene.sklep').position().left + $medium.find('.scene.sklep').width() - 480}, {left: $medium.find('.scene.szpital').position().left + 20}))
            .add(TweenMax.fromTo($medium.find('.scene.szpital .stat.korespondencja'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.to($near.find('.posel'), 0.5, {left: $medium.find('.scene.szpital').position().left + $medium.find('.scene.szpital').width() - 250}))
            .add(TweenMax.fromTo($medium.find('.scene.szpital .stat.badania'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.to($near.find('.posel'), 0.5, {left: $medium.find('.scene.bank').position().left + $medium.find('.scene.bank').width() / 2}))
            .add(TweenMax.fromTo($medium.find('.scene.bank .stat.rachunki'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.to($near.find('.posel'), 0.5, {left: $medium.find('.scene.spotkanie').position().left + 490}))
            .add(TweenMax.fromTo($medium.find('.scene.spotkanie .stat.sala'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.to($near.find('.posel'), 0.2, {left: $near.find('.samochod').position().left}))
            .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 107}))
            .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 127, height: 50}));

        new ScrollScene({
            duration: ($medium.find('.scene.sklep').width() / 2 + $medium.find('.scene.szpital').width() + $medium.find('.scene.bank').width() + $medium.find('.scene.spotkanie').width() / 2)
        }).on("end", function () {
                $medium.find('.scene.szpital, .scene.bank, .scene.spotkanie').find('.stat').addClass('out');
                $near.find('.posel').css('visibility', 'hidden');
                $near.find('.samochod').addClass('in');
            })
            .triggerElement($medium.find('.scene.sklep .marker'))
            .setTween(poselWalk)
            .reverse(false)
            .addTo(controller);

        /*POSEL SAMOCHOD - SPOTKANIE, TLUMACZENIE*/
        var spotkanieSamochod = new TimelineMax()
            .add(TweenMax.fromTo($medium.find('.scene.spotkanie .stat.przejazd'), 0.5, {opacity: 0}, {opacity: 1}))
            .add(TweenMax.fromTo($near.find('.samochod'), 3, {left: $medium.find('.scene.spotkanie').position().left + 200}, {left: $medium.find('.scene.tlumaczenia').position().left + $medium.find('.scene.tlumaczenia').width() - 400}));

        new ScrollScene({
            duration: minScreenWidth / 2
        }).on("end", function () {
                $medium.find('.scene.spotkanie .stat').addClass('out');
                $near.find('.samochod').removeClass('in');
                $near.find('.posel').css('visibility', 'visible');
            })
            .triggerElement($medium.find('.scene.tlumaczenie'))
            .setTween(spotkanieSamochod)
            .reverse(false)
            .addTo(controller);
    }

    $window.scroll(function () {
        if (posMap) {
            var i, pos = $window['scrollLeft']() + $html['width']() / 2;

            for (i = 0; i < posMap.length; i += 1) {
                if (posMap[i].pos < pos) {
                    break;
                }
            }
        }
    });

    $body.on('mousewheel DOMMouseScroll', function (e) {
        var delta = 0;
        e = e.originalEvent;
        if (e.wheelDelta) {
            delta = -e.wheelDelta;
        }
        if (e.detail) {
            delta = e.detail * 40;
        }

        if ((delta > minScreenWidth * .02) || (delta < -(minScreenWidth * .2)))
            delta = Math.floor(minScreenWidth * .02);

        scrollTo(String(Math.floor(delta)));

        return false;
    });

    $body.keydown(keyHandler);
    $body.keypress(keyHandler);
    $window.resize(calculateOffsets);
    $window.resize(onResize);

    introAnimation();
    repeatButton();
    scrollTo(0);
    setTimeout(function () {
        onResize();
        calculateOffsets();
        TweenLite.ticker.addEventListener('tick', introAnimation);
    }, 1050);

    TweenLite.ticker.addEventListener('tick', tickHandler);
});