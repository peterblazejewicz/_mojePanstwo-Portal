/*POSEL WALK SEJM - BIURO*//*

 var sejmSamochod = new TimelineMax()
 .add(TweenMax.fromTo($medium.find('.scene.sejm .stat.przejazd'), 0.5, {opacity: 0}, {opacity: 1}))
 .add(TweenMax.fromTo($near.find('.samochod'), 1, {left: $medium.find('.scene.sejm').position().left + 850}, {left: $medium.find('.scene.biuro').position().left + $medium.find('.scene.biuro').width() - 1100}));

 new ScrollScene({
 duration: minScreenWidth / 2
 }).on("start",function(){
 console.log('sejmSamochod')
 }).on("end", function () {
 //$near.find('.samochod').removeClass('in');
 })
 .triggerElement($medium.find('.scene.sejm .stat.przejazd'))
 .setTween(sejmSamochod)
 .reverse(false)
 .addTo(controller);
 */

/*POSEL WALK - BIURO + INSIDE*//*

 var biuroPosel = new TimelineMax()
 .add(TweenMax.to($near.find('.posel'), 0.5, {left: $medium.find('.scene.biuro').position().left + $medium.find('.scene.biuro').width() - 700}))
 .add(TweenMax.fromTo($medium.find('.scene.biuro .stat.biura'), 0.5, {opacity: 0}, {opacity: 1}));

 new ScrollScene({
 duration: $medium.find('.scene.biuro').width() * .7
 }).on("start", function () {
 $near.find('.posel').removeClass('hide').css({left: $medium.find('.scene.biuro').position().left + $medium.find('.scene.biuro').width() - 920});
 }).on("end", function () {
 $medium.find('.scene.biuro').find('.stat').addClass('out');
 })
 .triggerElement($medium.find('.scene.biuro'))
 .setTween(biuroPosel)
 .reverse(false)
 .addTo(controller);
 */

/*POSEL WALK - BIURO + SKLEP*//*

 var biuroSklep = new TimelineMax()
 .add(TweenMax.fromTo($near.find('.posel'), 2, {
 left: $medium.find('.scene.biuro').position().left + $medium.find('.scene.biuro').width() - 700
 }, {
 left: $medium.find('.scene.sklep').position().left + $medium.find('.scene.sklep').width()
 }))
 .add(TweenMax.fromTo($medium.find('.scene.sklep .stat.materialy'), 0.5, {opacity: 0}, {opacity: 1}))
 .add(TweenMax.fromTo($medium.find('.scene.sklep .stat.srodki'), 0.5, {opacity: 0}, {opacity: 1}));

 new ScrollScene({
 duration: $medium.find('.scene.sklep').width() * .7
 }).on("start", function () {
 }).on("end", function () {
 $medium.find('.scene.sklep').find('.stat').addClass('out');
 })
 .triggerElement($medium.find('.scene.sklep'))
 .setTween(biuroSklep)
 .reverse(false)
 .addTo(controller);
 */

/*POSEL WALK - SKLEP, SZPITAL, BANK, SPOTKANIE*/
var poselWalk = new TimelineMax()
    .add(TweenMax.fromTo($near.find('.posel'), 2, {left: $medium.find('.scene.sklep').position().left + $medium.find('.scene.sklep').width()}, {left: $medium.find('.scene.szpital').position().left + 20}))
    .add(TweenMax.fromTo($medium.find('.scene.szpital .stat.korespondencja'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.to($near.find('.posel'), 2.5, {left: $medium.find('.scene.szpital').position().left + $medium.find('.scene.szpital').width() - 250}))
    .add(TweenMax.fromTo($medium.find('.scene.szpital .stat.badania'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.to($near.find('.posel'), 4, {left: $medium.find('.scene.bank').position().left + $medium.find('.scene.bank').width() / 2}))
    .add(TweenMax.fromTo($medium.find('.scene.bank .stat.rachunki'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.to($near.find('.posel'), 4, {left: $medium.find('.scene.spotkanie').position().left + 490}))
    .add(TweenMax.fromTo($medium.find('.scene.spotkanie .stat.sala'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 107}))
    .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 127, height: 50}));


new ScrollScene({
    duration: ($medium.find('.scene.biuro').width() / 2 + $medium.find('.scene.szpital').width() + $medium.find('.scene.bank').width() + $medium.find('.scene.spotkanie').width() + $medium.find('.scene.tlumaczenia').width() + $medium.find('.scene.dom').width() - (minScreenWidth / 2))
}).on("end", function () {
        $medium.find('.scene.szpital, .scene.bank, .scene.spotkanie, .scene.tlumaczenia, .scene.dom').find('.stat').addClass('out');
    })
    .triggerElement($medium.find('.scene.biuro .marker'))
    .setTween(poselWalk)
    .reverse(false)
    .addTo(controller);

/*POSEL SAMOCHOD - SPOTKANIE, TLUMACZ*/
/*WSIADANIE DO SAMOCHODU
 .add(TweenMax.to($near.find('.posel'), 5, {left: $medium.find('.scene.tlumaczenia').position().left + $medium.find('.scene.tlumaczenia').width() - 210}))
 .add(TweenMax.fromTo($medium.find('.scene.tlumaczenia .stat.ekspertyzy'), 0.5, {opacity: 0}, {opacity: 1}))


 /*POSEL WALK - TLUMACZ, DOM*/
/*.add(TweenMax.to($near.find('.posel'), 5, {left: $medium.find('.scene.dom').position().left + $medium.find('.scene.dom').width() - 290}))
 .add(TweenMax.fromTo($medium.find('.scene.dom .stat.prywatny'), 0.25, {opacity: 0}, {opacity: 1}))
 .add(TweenMax.fromTo($medium.find('.scene.dom .stat.dom'), 0.25, {opacity: 0}, {opacity: 1}));*/


/*POSEL TAXI - WALK + CALL*/
var poselTaxi = new TimelineMax()
    .add(TweenMax.fromTo($near.find('.taxi'), 10, {
        left: $medium.find('.scene.tlumaczenia').position().left,
        opacity: 0
    }, {left: $medium.find('.scene.tlumaczenia').position().left, opacity: 1}))
    .add(TweenMax.to($near.find('.taxi'), 6, {left: $medium.find('.scene.dom').position().left + $medium.find('.scene.dom').width() - 300}))
    .add(TweenMax.to($near.find('.posel'), 1.5, {left: $medium.find('.scene.dom').position().left + $medium.find('.scene.dom').width() - 220}))
    .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 107}))
    .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 127, height: 50}));

new ScrollScene({
    duration: ($medium.find('.scene.dom').width())
}).on("end", function () {
        $near.find('.posel').addClass('hide');
        $near.find('.taxi').addClass('in');
    })
    .triggerElement($medium.find('.scene.dom'))
    .setTween(poselTaxi)
    .reverse(false)
    .addTo(controller);

/*POSEL TAXI - RIDE*/
var poselTaxiRide = new TimelineMax()
    .add(TweenMax.fromTo($medium.find('.scene.droga .stat.taksowka'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.fromTo($near.find('.taxi'), 1, {left: $medium.find('.scene.dom').position().left + $medium.find('.scene.dom').width() - 300}, {left: $medium.find('.scene.lotnisko').position().left - 80}));

new ScrollScene({
    duration: ($medium.find('.scene.droga').width() / 2)
}).on("end", function () {
        $medium.find('.scene.droga').find('.stat').addClass('out');
    })
    .triggerElement($medium.find('.scene.droga .marker'))
    .setTween(poselTaxiRide)
    .reverse(false)
    .addTo(controller);

/*POSEL LOTNISKO - WALK*/
var poselLotnisko = new TimelineMax()
    .add(TweenMax.fromTo($near.find('.posel'), 0.1, {left: $medium.find('.scene.lotnisko').position().left}, {
        left: $medium.find('.scene.lotnisko').position().left,
        bottom: 107,
        height: 110
    }))
    .add(TweenMax.to($near.find('.posel'), 0.1, {bottom: 122}))
    .add(TweenMax.fromTo($medium.find('.scene.lotnisko .stat.loty'), 0.5, {opacity: 0}, {opacity: 1}))
    .add(TweenMax.to($near.find('.posel'), 1, {left: $medium.find('.scene.lotnisko').position().left + 200}))
    .add(TweenMax.to($near.find('.posel'), 0.5, {opacity: 0}));

new ScrollScene({
    duration: ($medium.find('.scene.lotnisko').width() / 2)
}).on("start", function () {
        $near.find('.posel').removeClass('hide').css({left: $medium.find('.scene.lotnisko').position().left});
        $near.find('.taxi').removeClass('in');
    })
    .on("end", function () {
        $near.find('.posel').addClass('hide');
        $medium.find('.scene.lotnisko').find('.stat').addClass('out');
    })
    .triggerElement($medium.find('.scene.lotnisko'))
    .setTween(poselLotnisko)
    .reverse(false)
    .addTo(controller);

/*POSEL LOT*/
var poselLot = new TimelineMax()
    .add(TweenMax.fromTo($near.find('.samolot'), 5, {
        left: $medium.find('.scene.lotnisko').position().left + 215,
        rotation: 0
    }, {
        left: $medium.find('.scene.stats').position().left,
        bottom: "+=" + $window.height() / 2,
        rotation: -15
    }));

new ScrollScene({
    duration: ($medium.find('.scene.lot').width())
})
    .triggerElement($medium.find('.scene.lotnisko .marker'))
    .setTween(poselLot)
    .reverse(false)
    .addTo(controller);