<?

	$this->Combinator->add_libs( 'css', $this->Less->css( 'view-prawo_hasla', array( 'plugin' => 'Dane' ) ) );

	// $this->Combinator->add_libs( 'css', $this->Less->css( 'dataobjectslider', array( 'plugin' => 'Dane' ) ) );
	// $this->Combinator->add_libs( 'js', 'jquery-tags-cloud-min' );
	// $this->Combinator->add_libs( 'js', 'Dane.view-poslowie.js' );

echo $this->Element( 'dataobject/pageBegin' );
?>

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

<?= $this->Element( 'dataobject/pageEnd' ); ?>