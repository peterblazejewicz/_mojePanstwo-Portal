<?php $this->Combinator->add_libs( 'css', $this->Less->css( 'view-legislacja', array( 'plugin' => 'Dane' ) ) ); ?>

<?= $this->Element( 'dataobject/pageBegin' ); ?>


	<div class="legislacja_projekty_ustaw row">

		<div class="col-md-2">
			<div class="objectMenu vertical">
				<ul class="nav nav-pills nav-stacked row">
					<li class="active">
						<a href="#info" class="normalizeText">Info</a>
					</li>
					<? foreach ( $_menu as $m ) { ?>
						<li>
							<a class="normalizeText" href="#<?= $m['id'] ?>"><?= $m['label'] ?></a>
						</li>
					<? } ?>
				</ul>
			</div>
		</div>

		<div class="col-md-10">
			<div class="objectsPageContent main">
				<div class="object">
					
					<div class="block">
						<div class="overflow-auto">
							<div class="col-lg-6 nopadding">
		
								<? if ( $object->getData( 'opis' ) ) { ?>
											
									<div class="block-header">
										<h2 class="label">Opis</h2>
									</div>
	
									<div class="content textBlock">
										<?= $object->getData( 'opis' ) ?>
									</div>
		
								<? } elseif( $object->getData( 'autorzy_html' ) ) { ?>
	
									<div class="block-header">
										<h2 class="label">Autor</h2>
									</div>
	
									<div class="content textBlock">
										<?= $object->getData( 'autorzy_html' ) ?>
									</div>
		
								<? } ?>
		
							</div>
		
							<div class="col-lg-6 nopadding">
		
								<? if ( $object->getData( 'autorzy_html' ) ) { ?>
		
									<div class="block-header">
										<h2 class="label">Autor</h2>
									</div>
	
									<div class="content textBlock">
										<?= $object->getData( 'autorzy_html' ) ?>
									</div>
		
								<? } ?>
		
		
							</div>
						</div>
						
					</div>



					<?php foreach ( $object->layers['related']['groups'] as $group ) { ?>
						<div class="block">

							<div class="block-header">
								<h2 class="label"><?php echo $group['title']; ?></h2>
							</div>

							<div class="content">
								<?
								foreach ( $group['objects'] as $obj ) {

									$options = array(
										'hlFields' => array(),
									);

									switch ( $obj->getDataset() ) {
										case 'sejm_zamrazarka': {
											$options = array_merge( $options, array(
												'forceTitle' => 'Dostarczenie projektu Marszałkowi Sejmu',
											) );
											break;
										}

										case 'sejm_druki': {

											if ( in_array( $obj->getData( 'typ_id' ), array( '1', '2' ) ) ) {
												$forceTitle = 'Wydrukowanie projektu i dostarczenie posłom';
											} else {
												$forceTitle = $obj->getData( 'druk_typ_nazwa' );
											}

											$options = array_merge( $options, array(
												'forceTitle' => $forceTitle,
												'hlFields'   => array( 'numer' ),
											) );
											break;
										}

										case 'sejm_posiedzenia_punkty': {
											$options = array_merge( $options, array(
												'forceTitle' => 'Czytanie projektu w Sejmie',
												'hlFields'   => array(
													'sejm_posiedzenia.tytul',
													'numer',
													'liczba_wystapien',
													'liczba_glosowan'
												),
											) );
											break;
										}

										case 'sejm_glosowania': {
											$options = array_merge( $options, array(
												'forceTitle' => $obj->getData( 'sejm_glosowania_typy.nazwa' ),
												'hlFields'   => array(
													'sejm_posiedzenia.tytul',
													'numer',
													'wynik_id'
												),
											) );
											break;
										}
									}

									// echo $obj->getDataset();
									echo $this->Dataobject->render( $obj, 'default', $options );

								}
								?>
							</div>

						</div>
					<?php } ?>


				</div>
			</div>
		</div>

	</div>


<?= $this->Element( 'dataobject/pageEnd' ); ?>