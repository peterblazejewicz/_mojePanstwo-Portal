<?php $this->Combinator->add_libs('css', $this->Less->css('new-look')) ?>
<?php $this->Combinator->add_libs('css', $this->Less->css('wydatki_poslow', array('plugin' => 'WydatkiPoslow'))); ?>
<?php $this->Combinator->add_libs('js', 'WydatkiPoslow.libs.js'); ?>
<?php $this->Combinator->add_libs('js', 'WydatkiPoslow.wydatki_poslow.js'); ?>

<div id="storyLine">
    <div class="innerStory">
        <div class="far">
            <div class="clouds"></div>
        </div>
        <div class="medium">
            <div class="scene intro" data-scene="1">
                <div class="title">
                    <h3><strong>Dowiedz się ile kosztuje</strong><br>obsługa pracy posłów.</h3>
                </div>
                <div class="scrollHint">
                    <img src="/WydatkiPoslow/img/mysz.svg" class="scrollInfo"/>
                    <img src="/WydatkiPoslow/img/poslanka.svg" class="poslankaBckgrnd"/>
                    <img src="/WydatkiPoslow/img/posel.svg" class="poselBckgrnd"/>
                </div>
                <a class="wyjazdyBtn" href="/wyjazdy_poslow" target="_self">Dodatkowo<br>sprawdź gdzie<br>i za ile
                    wyjażdzają<br>posłowie<i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
            <div class="scene sejm" data-scene="2">
                <div class="building"></div>
                <div class="stat wyplacane">
                    <p>Wynagrodzenia posłów</p>
                    <strong><?= number_format($biura[4]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="sub">Średnia na posła: <?= number_format($biura[4]['wartosc'] / 460, 0, '.', ' ') ?>
                        <small>PLN</small>
                    </div>
                </div>
                <div class="stat pracownikow">
                    <p>Wynagrodzenia pracowników posłów</p>
                    <strong><?= number_format($biura[2]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat zlecenia">
                    <p>Wynagrodzenia?<br>współpracowników posłów</p>
                    <strong>0
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
            </div>
            <div class="scene biuro" data-scene="3">
                <div class="stat biura">
                    <p>Koszty wynajmu lokalu<br>na biura poselskie</p>
                    <strong><?= number_format($biura[12]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat konserwacje">
                    <p>Konserwacja i naprawa<br>sprzętu technicznego<br>w biurze poselskim</p>
                    <strong><?= number_format($biura[13]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat naprawy">
                    <p>Koszty drobnych napraw<br>i remontów lokalu biura poselskiego</p>
                    <strong><?= number_format($biura[14]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene sklep" data-scene="4">
                <div class="stat materialy">
                    <p>Zakup materiałów biurowych,<br>prasy, wydawnictw, środków bhp itp</p>
                    <strong><?= number_format($biura[15]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat srodki">
                    <p>Zakup środków trwalych<br>o charakterze wyposażenia</p>
                    <strong><?= number_format($biura[16]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene szpital" data-scene="5">
                <div class="stat korespondencja">
                    <p>Korespondencja i ogłoszenia</p>
                    <strong><?= number_format($biura[9]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat badania">
                    <p>Badanie lekarskie<br>i szkolenia pracowników</p>
                    <strong><?= number_format($biura[3]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat swiadczenia">
                    <p>Świadczenia urlopowe wypłacane<br>pracownikom biura poselskiego,<br>o których mowa w pkt 1</p>
                    <strong><?= number_format($biura[19]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
            </div>
            <div class="scene bank" data-scene="6">
                <div class="stat rachunki">
                    <p>Obsługa rachunkowo-księgowa<br>i bankowa biur poselskich</p>
                    <strong><?= number_format($biura[20]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
            </div>
            <div class="scene spotkanie" data-scene="7">
                <div class="name">
                    <p>Spotkanie z posłem</p>
                </div>
                <div class="men"></div>
                <div class="stat sala">
                    <p>Koszty wynajmowania sal<br>na spotkania z wyborcami</p>
                    <strong><?= number_format($biura[9]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene tlumaczenia" data-scene="8">
                <div class="stat przejazd">
                    <p>Przejazdy posłów<br>samochodem własnym lub innym</p>
                    <strong><?= number_format($biura[10]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="stat ekspertyzy">
                    <p>Ekspertyzy, opinie, tłumaczenia</p>
                    <strong><?= number_format($biura[5]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene dom" data-scene="9">
                <div class="stat telefonDom">
                    <p>Koszty usług telekomunikacyjnych<br>w "Domu Poselskim"<br>oraz w kwaterach prywatnych<br>w
                        Warszawie, potrąconych<br>przez Kancelarię Sejmu<br>z ryczałtu na biuro poselskie</p>
                    <strong><?= number_format($biura[7]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon posel">wydatki na posłów w 2013r.</div>
                </div>
                <div class="stat telefonPosel">
                    <p>Koszty usług telekomunikacyjnych<br>związanych z wykonaniem<br>mandatu poselskiego,<br>z
                        wyjątkiem kosztów<br>o których mowa w pkt 6</p>
                    <strong><?= number_format($biura[6]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon posel">wydatki na posłów w 2013r.</div>
                </div>
                <div class="stat prywatny">
                    <p>Koszty wynajmu kwater prywatnych</p>
                    <strong>209 304
                        <small>PLN</small>
                    </strong>

                    <div class="icon posel">wydatki na posłów w 2013r.</div>
                </div>
                <div class="stat dom">
                    <p>Koszty najmu kwater<br>w Domu poselskim</p>
                    <strong>209 304
                        <small>PLN</small>
                    </strong>

                    <div class="icon posel">wydatki na posłów w 2013r.</div>
                </div>
            </div>
            <div class="scene droga" data-scene="10">
                <div class="stat taksowka">
                    <p>Przejazdy posłów taksówkami</p>
                    <strong><?= number_format($biura[11]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene lotnisko" data-scene="11">
                <div class="building"></div>
                <div class="stat loty">
                    <p>Podróże służbowe pracowników<br>biur poselskich</p>
                    <strong><?= number_format($biura[17]['wartosc'], 0, '.', ' ') ?>
                        <small>PLN</small>
                    </strong>

                    <div class="icon biuro">wydatki na biura poselskie w 2013r.</div>

                    <a class="btn btn-primary btn-sm">Zobacz gdzie i za ile latają posłowie &raquo;</a>
                </div>
                <div class="marker"></div>
            </div>
            <div class="scene lot" data-scene="12"></div>
            <div class="scene stats" data-scene="13">
                <div class="screen">
                    <div class="container">
                        <div class="col-xs-12">
                            <div class="list">
                                <h3>Lista wszystkich wydatków</h3>

                                <div class="options col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4">
                                    <a class="btn btn-info pull-left repeat" href="#">Jeszcze raz</a>
                                    <a class="btn btn-info pull-right more" href="http://mojepanstwo.pl" target="_self">Dowiedz
                                        się
                                        więcej</a>
                                </div>

                                <ul class="col-xs-12">
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                    <li class="col-xs-12 col-md-6">
                                        <div class="txt">Wynagrodzenie pracowników biura poselskiego</div>
                                        <div class="cost">1 230 576 PLN</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="near">
            <div class="posel"></div>
            <div class="samochod"></div>
            <div class="taxi"></div>
            <div class="samolot"></div>
        </div>
    </div>
</div>