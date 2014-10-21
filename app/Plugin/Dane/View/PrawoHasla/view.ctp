<?

	$this->Combinator->add_libs( 'css', $this->Less->css( 'view-prawo_hasla', array( 'plugin' => 'Dane' ) ) );

	// $this->Combinator->add_libs( 'css', $this->Less->css( 'dataobjectslider', array( 'plugin' => 'Dane' ) ) );
	// $this->Combinator->add_libs( 'js', 'jquery-tags-cloud-min' );
	// $this->Combinator->add_libs( 'js', 'Dane.view-poslowie.js' );

	echo $this->Element( 'dataobject/pageBegin' );
?>
	
	<? $data = $object->getLayer('akty'); ?>
	
	<div class="row">
		
		<div class="col-md-3">
			
			<? 
			if( !empty($data['keywords']) ) {
			?>
			
			<div class="block">
				<div class="block-header">
					<h2 class="label">Powiązane hasła</h2>
				</div>
				<div class="content">
					<ul class="keywords">
					<?
						foreach( $data['keywords'] as $keyword ) {
					?>
						<li><a href="/dane/prawo_hasla/<?= $keyword['key'] ?>"><span class="label label-default"><?= $keyword['q'] ?></span></a></li>	
					<?		
						}
					?>
					</ul>
				</div>
			</div>
			<? 
			}
			?>
			
		</div>
		
		<div class="col-md-9">

			<? 
			if( !empty($data['acts']) ) {
			?>
			<div class="object mpanel">
				<div class="block">
					<div class="block-header">
						<h2 class="label">Ważne akty prawne</h2>
					</div>
					<div class="content">
						<ul class="acts">
						<?
							foreach( $data['acts'] as $act ) {
						?>
							<li>
								<p class="title"><a href="/dane/prawo/<?= $act['id'] ?>"><?= $act['typ_nazwa'] ?> <?= $act['tytul_skrocony'] ?></a></p>
								<? if( $opis = $act['opis'] ) {?><div class="desc"><?= $opis ?></div><? } ?>
							</li>	
						<?		
							}
						?>
						</ul>
					</div>
				</div>
			</div>
			<?
			}
			?>

		</div>
		
	</div>
	
	
	
	
	<? /*
	<div class="mpanel">

		<div class="haslo row">
			
			<?
				if( $parents = $object->getLayer('akty') ) {
			?>
				<ul class="parents">
			<?
					foreach( $parents as $parent ) {
			?>
					<li>
						<p class="title"><a href="/dane/prawo/<?= $parent['item']['id'] ?>"><?= $parent['item']['tytul'] ?></a></p>
			<?
						if( $children = $parent['children'] ) {
			?>
						<ul class="children">
			<?
						$i = 0; foreach( $children as $child ) {
			?>
							<li>
								<p class="title"><a href="/dane/prawo/<?= $child['item']['id'] ?>"><?= $child['item']['tytul'] ?></a></p>
							</li>
			<?
						$i++;  if($i==3) break; }
			?>
						</ul>
			<?
						}
			?>
					</li>
			<?			
					}
			?>
				</ul>
			<?
				}
			?>
			
		</div>
	
	</div>
	*/ ?>

<?= $this->Element( 'dataobject/pageEnd' ); ?>