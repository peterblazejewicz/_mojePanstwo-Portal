<?php
$this->Combinator->add_libs('css', $this->Less->css('wyjazdy_poslow', array('plugin' => 'WyjazdyPoslow')));
$this->Combinator->add_libs('js', '../plugins/highmaps/js/highmaps');
$this->Combinator->add_libs('js', 'WyjazdyPoslow.wyjazdy_poslow.js');
?>

<div class="app-header">
	<div class="container">
		<h1>Wyjazdy zagraniczne posłów</h1>
	</div>
</div>

<div id="wyjazdyPoslowMap"></div>

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
								<p class="title"><a href="/dane/poslowie/<?= $i['id'] ?>"><?= $i['nazwa'] ?></a> <span class="klub">(<a href="/dane/sejm_kluby/<?= $i['klub_id'] ?>"><?= $i['skrot'] ?></a>)</span></p>
								<p class="desc"><?= pl_dopelniacz($i['count'], 'wyjazd', 'wyjazdy', 'wyjazdów') ?> na kwotę <?= _currency($i['sum']) ?></p>
							</div>
						</li>
					<? } ?>
					</ul>
					
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
				<h2 class="label">Kontrowersje</h2>
			</div>
			
			<div class="content">
				
				<p>Poniżej prezentujemy daty zagranicznych wydarzeń, w których brali udział posłowie pokrywające się z datami głosowań, na których ci sami posłowie byli obecni.</p>

<p>Zestawienie tych danych nie jest równoznaczne z nieobecnością posłów w delegacjach. Jak poinformowała Kancelaria Sejmu niektórzy z posłów skracali swój pobyt w czasie dłuższych delegacji ze względu na obowiązek wzięcia udziału w głosowaniach w Polsce.</p>
				
				
			</div>
			
		</div>
		
		
		<div class="col-md-10 col-md-offset-1">
				
				<ul class="controversy">
					
					
<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/763.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/9">Iwona Ewa Arent</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA Paryż. Wizyta studyjna organizowana przez francuskie Ministerstwo Spraw Zagranicznych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-22 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p></div>
					</li>

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
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/34.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/47">Bożenna Bukiewicz</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHINY Pekin. Polsko-Chińska Grupa Parlamentarna</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-11-11 - 2012-11-19</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-11-16</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/38.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/50">Renata Butryn</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">LITWA Wilno. ZP NATO Wiosenna Sesja</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-05-29 - 2014-06-02</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-05-30</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/73.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/81">Jan Dziedziczak</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">BELGIA Bruksela. ZP NATO Międzyparlamentarna Rada Ukraina-NATO</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-12-11 - 2013-12-12</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-12-11</span> <span class="label label-danger">2013-12-12</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/793.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/90">Anna Fotyga</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">BELGIA Bruksela. ZP NATO Międzyparlamentarna Rada Ukraina-NATO</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2013-12-11 - 2013-12-12</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2013-12-11</span> <span class="label label-danger">2013-12-12</span></p></div>
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
							<p class="title"><a href="/dane/poslowie/124">Iwona Guzowska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/117.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/125">Andrzej Halicki</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p></div>
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
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/469.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/145">Andrzej Jaworski</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">BOŚNIA I HERCEGOWINA Sarajewo. ZP OBWE Obserwacja wyborów generalnych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-10-09 - 2014-10-13</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-10</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/814.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/147">Dariusz Joński</a> <span class="klub">(<a href="/dane/sejm_kluby/4">SLD</a>)</span></p><p class="event">FRANCJA Paryż. Wizyta studyjna organizowana przez francuskie Ministerstwo Spraw Zagranicznych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-22 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/137.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/151">Roman Kaczor</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHINY Pekin. Polsko-Chińska Grupa Parlamentarna</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-11-11 - 2012-11-19</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-11-16</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/819.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/157">Mariusz Antoni Kamiński</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p><p class="event">WŁOCHY Rzym. OBN, SZA Międzyparlamentarna Konferencja do spraw Wspólnej Polityki Bezpieczeństwa i Obrony</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-11-05 - 2014-11-08</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-11-05</span> <span class="label label-danger">2014-11-07</span></p></div>
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
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/192.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/203">Marek Krząkała</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">NIEMCY Berlin. Uroczystości wręczenia nagrody Niemiecko-Polskiej Szkole Europejskiej i Niemiecko-Polskiemu Gimnazjum Locknitz oraz miastu Wrocław</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-14 - 2012-06-14</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-14</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/836.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/208">Adam Kwiatkowski</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">BIAŁORUŚ Brześć. LPG Spotkanie z zarządem druż yny sportowej "Sokół-Brześć"</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-09-14 - 2012-09-14</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-09-14</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/204.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/213">Tomasz Latos</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">CHINY Pekin. Polsko-Chińska Grupa Parlamentarna</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-11-11 - 2012-11-19</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-11-16</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/209.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/218">Adam Lipiński</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">AUSTRALIA Canberra, Melbourne, Sydney. LPG W składzie oficjalnej delegacji z Marszałkiem Senatu B. Borusewiczem na zaproszenie Przewodniczącego Senatu, Johna Hogga oraz Przewodniczącej Izby Reprezentantów, Bronwyn Bishop</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-02-03 - 2014-02-13</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-02-07</span></p></div>
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
							<p class="title"><a href="/dane/poslowie/268">Mirosława Nykiel</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/266.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/271">Alicja Olechowska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">ARABIA SAUDYJSKA Rijad. Misja gospodarcza polskich kobiet</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-12-08 - 2012-12-13</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-12-12</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/271.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/274">Marek Opioła</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">AFGANISTAN Kabul. ZP NATO Wizyta Biura ZP NATO</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-11-19 - 2012-11-23</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-11-21</span> <span class="label label-danger">2012-11-22</span> <span class="label label-danger">2012-11-23</span></p><p class="event">USA Boston, Norfolk, Waszyngton. ZP NATO Podkomisja ds. przyszłego potencjału obronnego i bezpieczeństwa (Komisja Obrony i Bezpieczeństwa)</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-07-06 - 2014-07-12</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-07-09</span> <span class="label label-danger">2014-07-11</span></p></div>
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
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/865.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/297">Elżbieta Apolonia Pierzchała</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">CHINY Pekin. Polsko-Chińska Grupa Parlamentarna</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-11-11 - 2012-11-19</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-11-16</span></p></div>
					</li>

<li class="row">
						<div class="col-md-1 text-right">
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/310.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/321">Elżbieta Radziszewska</a> <span class="klub">(<a href="/dane/sejm_kluby/1">PO</a>)</span></p><p class="event">FRANCJA Strasburg. ZPRE 1 część sesji 2012</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-01-21 - 2012-01-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-01-26</span> <span class="label label-danger">2012-01-27</span></p><p class="event">FRANCJA Strasburg. ZPRE 2 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-04-22 - 2012-04-27</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-04-25</span> <span class="label label-danger">2012-04-27</span></p><p class="event">FRANCJA, Strasburg. ZPRE 3 część sesji 2012 r.</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2012-06-24 - 2012-06-29</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2012-06-28</span></p><p class="event">FRANCJA Strasburg. ZPRE 3 część sesji 2014</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-21 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p><p class="event">FRANCJA Strasburg. ZPRE 4 część sesji</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-09-27 - 2014-10-03</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-10-01</span></p></div>
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
							<img class="border" src="http://resources.sejmometr.pl/mowcy/a/2/888.jpg" />
						</div><div class="col-md-11">
							<p class="title"><a href="/dane/poslowie/374">Krzysztof Szczerski</a> <span class="klub">(<a href="/dane/sejm_kluby/2">PiS</a>)</span></p><p class="event">FRANCJA Paryż. Wizyta studyjna organizowana przez francuskie Ministerstwo Spraw Zagranicznych</p><p class="dates">Wydarzenie w dniach: <span class="label label-warning">2014-06-22 - 2014-06-28</span>. Poseł głosował w Sejmie w dniach: <span class="label label-danger">2014-06-25</span> <span class="label label-danger">2014-06-26</span></p></div>
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