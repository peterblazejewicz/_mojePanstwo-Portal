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
        <h3><strong>Dowiedz się ile kosztuje</strong><br>obsługa pracy posłów</h3>
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
        <span data-toggle="tooltip" data-placement="bottom"
              title="Kwota obejmuje wydatki na uposażenia poselskie i dodatki do uposażeń, odprawy emerytalne oraz wynagrodzenie Prezydium Sejmu (nie obejmuje składek na ubezpieczenie społeczne oraz składek na fundusz pracy)">Wydatki na wynagrodzenie posłów i dodatkowe świadczenia</span>
        <strong><?= number_format(54889000 / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony na posła w 2013 r.</div>
    </div>
    <div class="stat diety">
        <span>Diety poselskie</span>
        <strong><?= number_format(13607000 / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony na posła w 2013 r.</div>
    </div>
    <div class="stat pracownikow">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[2]['tytul'] ?>"><?= $biura[2]['skrot'] ?></span>
        <strong><?= number_format($biura[2]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony na posła w 2013 r.</div>
    </div>
    <div class="stat zlecenia">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[4]['tytul'] ?>"><?= $biura[4]['skrot'] ?></span>
        <strong><?= number_format($biura[4]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony na posła w 2013 r.</div>
    </div>
</div>
<div class="scene biuro" data-scene="3">
    <div class="stat biura">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[12]['tytul'] ?>"><?= $biura[12]['skrot'] ?></span>
        <strong><?= number_format($biura[12]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat konserwacje">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[13]['tytul'] ?>"><?= $biura[13]['skrot'] ?></span>
        <strong><?= number_format($biura[13]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat naprawy">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[14]['tytul'] ?>"><?= $biura[14]['skrot'] ?></span>
        <strong><?= number_format($biura[14]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="marker"></div>
</div>
<div class="scene sklep" data-scene="4">
    <div class="stat materialy">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[15]['tytul'] ?>"><?= $biura[15]['skrot'] ?></span>
        <strong><?= number_format($biura[15]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat srodki">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[16]['tytul'] ?>"><?= $biura[16]['skrot'] ?></span>
        <strong><?= number_format($biura[16]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="marker"></div>
</div>
<div class="scene szpital" data-scene="5">
    <div class="stat korespondencja">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[8]['tytul'] ?>"><?= $biura[8]['skrot'] ?></span>
        <strong><?= number_format($biura[8]['wartosc'], 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat badania">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[3]['tytul'] ?>"><?= $biura[3]['skrot'] ?></span>
        <strong><?= number_format($biura[3]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat swiadczenia">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[19]['tytul'] ?>"><?= $biura[19]['skrot'] ?></span>
        <strong><?= number_format($biura[19]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
</div>
<div class="scene bank" data-scene="6">
    <div class="stat rachunki">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[20]['tytul'] ?>"><?= $biura[20]['skrot'] ?></span>
        <strong><?= number_format($biura[20]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
</div>
<div class="scene spotkanie" data-scene="7">
    <div class="name">
        <p>Spotkanie z posłem</p>
    </div>
    <div class="men"></div>
    <div class="stat sala">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[9]['tytul'] ?>"><?= $biura[9]['skrot'] ?></span>
        <strong><?= number_format($biura[9]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="marker"></div>
</div>
<div class="scene tlumaczenia" data-scene="8">
    <div class="stat przejazd">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[10]['tytul'] ?>"><?= $biura[10]['skrot'] ?></span>
        <strong><?= number_format($biura[10]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat ekspertyzy">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[5]['tytul'] ?>"><?= $biura[5]['skrot'] ?></span>
        <strong><?= number_format($biura[5]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="marker"></div>
</div>
<div class="scene dom" data-scene="9">
    <div class="stat telefonDom">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[7]['tytul'] ?>"><?= $biura[7]['skrot'] ?></span>
        <strong><?= number_format($biura[7]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat telefonPosel">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[6]['tytul'] ?>"><?= $biura[6]['skrot'] ?></span>
        <strong><?= number_format($biura[6]['wartosc'] / 460 / 12, 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat prywatny">
        <span data-toggle="tooltip" data-placement="bottom"
              title="Posłom, którzy nie są zameldowani na pobyt stały w Warszawie i nie posiadają innego uprawnienia do zakwaterowania na terenie tego miasta przysługuje refundacja kosztów za najem kwatery prywatnej">Koszty wynajmu kwater prywatnych</span>
        <strong>4 239 804
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="stat dom hide">
        <span>Koszty najmu kwater<br>w Domu poselskim</span>
        <strong>209 304
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
</div>
<div class="scene droga" data-scene="10">
    <div class="stat taksowka">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[11]['tytul'] ?>"><?= $biura[11]['skrot'] ?></span>
        <strong><?= number_format($biura[11]['wartosc'], 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>
    </div>
    <div class="marker"></div>
</div>
<div class="scene lotnisko" data-scene="11">
    <div class="building"></div>
    <div class="stat loty">
        <span data-toggle="tooltip" data-placement="bottom"
              title="<?= $biura[17]['tytul'] ?>"><?= $biura[17]['skrot'] ?></span>
        <strong><?= number_format($biura[17]['wartosc'], 0, '.', ' ') ?>
            <small>PLN</small>
        </strong>

        <div class="sub">Średni miesięczny koszt poniesiony w 2013 r.</div>

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