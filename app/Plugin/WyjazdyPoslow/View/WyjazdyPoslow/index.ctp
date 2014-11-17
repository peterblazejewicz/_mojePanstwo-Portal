<?php
$this->Combinator->add_libs('css', $this->Less->css('wyjazdy_poslow', array('plugin' => 'WyjazdyPoslow')));
$this->Combinator->add_libs('js', '../plugins/highmaps/js/highmaps');
$this->Combinator->add_libs('js', 'WyjazdyPoslow.wyjazdy_poslow.js');
?>

<div class="app-header">
	<div class="container">
		<h1>Wyjazdy zagraniczne posłów</h1>

        <p class="desc">Sprawdź gdzie i za ile latają posłowie. Dane na podstawie <a
                href="http://orka.sejm.gov.pl/media.nsf/files/MDUA-9QSMYW/%24File/ZA%C5%81%C4%84CZNIK%20NR%205%20_Wyjazdy%20zagraniczne%20pos%C5%82%C3%B3w_VII%20kadencja.pdf"
                target="_blank">materiałów Kancelarii Sejmu</a>.<br/>Zobacz także <a
                href="http://blog.epf.org.pl/2014/11/afera-madrycka/" target="_blank">wpis na blogu Fundacji
                ePaństwo</a> o transparentności danych o wyjazdach posłów.</p>
	</div>
</div>

<div id="wyjazdyPoslowMap" class="loading"></div>

<div class="container">
    <div class="block-group">
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali</h2>
			</div>
			
			<div class="content row">
				<div class="col-md-6">
					
					<h3>Indywidualnie</h3>
					
					<ul>
					<? foreach( $stats['calosc']['indywidualne'] as $i ) {?>
						<li class="row">
							<div class="col-md-2 text-right">
								<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/<?= $i['mowca_id'] ?>.jpg" />
							</div><div class="col-md-10">
                                <p class="title"><a href="/dane/poslowie/<?= $i['id'] ?>/wyjazdy"><?= $i['nazwa'] ?></a>
                                    <span class="klub">(<a
                                            href="/dane/sejm_kluby/<?= $i['klub_id'] ?>"><?= $i['skrot'] ?></a>)</span>
                                </p>
								<p class="desc"><?= pl_dopelniacz($i['count'], 'wyjazd', 'wyjazdy', 'wyjazdów') ?> na kwotę <?= _currency($i['sum']) ?></p>
							</div>
						</li>
					<? } ?>
					</ul>
					
					<p class="text-center"><a class="btn btn-sm btn-default" href="#">Zobacz pełny ranking</a></p>
					
				</div>
				<div class="col-md-6">
					
					<h3>Klubowo</h3>

                    <ul>
					<? foreach( $stats['calosc']['klubowe'] as $i ) {?>
						<li class="row">
							<div class="col-md-2 text-right">
								<img src="http://resources.sejmometr.pl/s_kluby/<?= $i['id'] ?>_s_t.png" />
							</div><div class="col-md-10">
								<p class="title"><a href="/dane/sejm_kluby/<?= $i['id'] ?>"><?= $i['nazwa'] ?></a></p>
								<p class="desc"><?= pl_dopelniacz($i['count'], 'wyjazd', 'wyjazdy', 'wyjazdów') ?> na kwotę <?= _currency($i['sum']) ?></p>
							</div>
						</li>
					<? } ?>

					</ul>
					
				</div>
			</div>
			
		</div>
	
		
		
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Wyjazdy posłów, a prace w Sejmie</h2>
			</div>
			
			<div class="content">
				
				<p>Poniżej prezentujemy daty zagranicznych wydarzeń, w których brali udział posłowie pokrywające się z datami głosowań, na których ci sami posłowie byli obecni w Sejmie.</p>

<p>Zestawienie tych danych nie jest równoznaczne z nieobecnością posłów w delegacjach. Jak poinformowała Kancelaria Sejmu niektórzy z posłów skracali swój pobyt w czasie dłuższych delegacji ze względu na obowiązek wzięcia udziału w głosowaniach w Polsce.</p>
				
				
			</div>
			
		</div>
		
		
		<div class="col-md-10 col-md-offset-1">
				
				<ul class="controversy">
					
					

					<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/9.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/12">Paweł Arndt</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHORWAC JA Dubrownik. ZP NATO Doroczna sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-10-10 - 2013-10-15</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-10-11</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/17.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/21">Barbara Bartuś</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">ROSJA Moskwa, Irkuck, Władywostok. ZP OBWE Obserwacja wyborów parlamentarnych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2011-11-30 - 2011-12-05</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2011-12-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/768.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/26">Robert Biedroń</a> <span class="klub">(<a href="/dane/sejm_kluby/5">RP</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/38.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/50">Renata Butryn</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">LITWA Wilno. ZP NATO Wiosenna Sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-05-29 - 2014-06-02</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-05-30</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/93.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/102">Zbigniew Girzyński</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/802.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/113">Jarosław Górczyński</a> <span class="klub">(<a href="/dane/sejm_kluby/3">PSL</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/108.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/118">Mariusz Grad</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">ROSJA Moskwa, Irkuck, Władywostok. ZP OBWE Obserwacja wyborów parlamentarnych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2011-11-30 - 2011-12-05</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2011-12-01</span></p><p class="event">ALBANIA Tirana. ZP OBWE Obserwacja wyborów parlamentarnych w Albanii</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-06-20 - 2013-06-24</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-06-21</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/115.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/124">Iwona Guzowska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/117.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/125">Andrzej Halicki</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/121.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/129">Adam Hofman</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/122.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/133">Stanisław Huskowski</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-25</span> <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/123.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/134">Tadeusz Iwiński</a> <span class="klub">(<a href="/dane/sejm_kluby/4">SLD</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/819.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/157">Mariusz Antoni Kamiński</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/153.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/163">Jan Kaźmierczak</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/160.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/170">Joanna Kluzik-Rostkowska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">ALBANIA Tirana. ZP OBWE Obserwacja wyborów parlamentarnych w Albanii</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-06-20 - 2013-06-24</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-06-21</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/845.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/235">Jagna Marczułajtis-Walczak</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/250.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/254">Arkadiusz Mularczyk</a> <span class="klub">(<a href="/dane/sejm_kluby/6">SP</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-25</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/855.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/267">Wanda Nowicka</a> <span class="klub">(<a href="/dane/sejm_kluby/7">Niezrzeszeni</a>)</span></p><p class="event">EKWADOR Quito. UM 128 Sesja Unii Międzyparlamentarnej oraz spotkanie Stowarzyszenia Sekretarzy Generalnych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-03-20 - 2013-03-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-03-22</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/263.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/268">Mirosława Nykiel</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/273.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/276">Maciej Orzechowski</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/861.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/291">Wojciech Penkalski</a> <span class="klub">(<a href="/dane/sejm_kluby/5">RP</a>)</span></p><p class="event">LITWA Wilno. ZP NATO Wiosenna Sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-05-29 - 2014-06-02</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-05-30</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/310.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/321">Elżbieta Radziszewska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/318.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/326">Adam Rogacki</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/337.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/349">Dariusz Seliga</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">CHORWAC JA Dubrownik. ZP NATO Doroczna sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-10-10 - 2013-10-15</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-10-11</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/884.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/358">Henryk Smolarz</a> <span class="klub">(<a href="/dane/sejm_kluby/3">PSL</a>)</span></p><p class="event">ALBANIA Tirana. ZP OBWE Obserwacja wyborów parlamentarnych w Albanii</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-06-20 - 2013-06-24</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-06-21</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/366.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/369">Paweł Suski</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHORWAC JA Dubrownik. ZP NATO Doroczna sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-10-10 - 2013-10-15</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-10-11</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/370.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/373">Michał Szczerba</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">LITWA Wilno. ZP NATO Wiosenna Sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-05-29 - 2014-06-02</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-05-30</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/394.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/403">Cezary Tomczyk</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHORWAC JA Dubrownik. ZP NATO Doroczna sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-10-10 - 2013-10-15</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-10-11</span></p><p class="event">LITWA Wilno. ZP NATO Wiosenna Sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-05-29 - 2014-06-02</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-05-30</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/442.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/441">Łukasz Zbonikowski</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p>
							
</div>
					</li>
					

					
				</ul>
				
			</div>
		
		
		
		
	</div>
		
</div>