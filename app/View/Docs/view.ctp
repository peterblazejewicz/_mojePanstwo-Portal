<?
	$this->Combinator->add_libs('css', $this->Less->css('htmlexDocMain_v2'));
	$this->Combinator->add_libs('css', $this->Less->css('doc'));
?>

<div class="container">
	
	<h1><?= $doc['filename'] ?></h1>
	
	<div class="row objectsPage">
		
		<div class="col-md-2">
			
			<ul class="fields">
				<li>
					<p class="_label">Extension</p>
					<p class="_value"><?= $doc['fileextension'] ?></p>
				</li>
				<li>
					<p class="_label">Size</p>
					<p class="_value"><?= human_filesize( $doc['filesize'] ) ?></p>
				</li>
				<li>
					<p class="_label">Pages</p>
					<p class="_value"><?= $doc['pages_count'] ?></p>
				</li>
				<li>
					<p class="_label">Packages</p>
					<p class="_value"><?= $doc['packages_count'] ?></p>
				</li>
				<li>
					<p class="_label">CSS</p>
					<p class="_value"><a href="http://mojepanstwo/htmlex/<?= $doc['id'] ?>/<?= $doc['id'] ?>.css" target="_blank">LINK</a></p>
				</li>
				
				
				
			</ul>
			
		</div>
		<div class="col-md-10 objectsPageContent">
			
			<? echo $this->Element('Dane.docsBrowser/doc', array(
			    'document' => $document,
			    'documentPackage' => $documentPackage,
			)); ?>
			
		</div>
		
	</div>
</div>