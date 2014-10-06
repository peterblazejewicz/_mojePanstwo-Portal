<?

	$this->Combinator->add_libs('css', $this->Less->css('view-prawo', array('plugin' => 'Dane')));
	$this->Combinator->add_libs('css', 'timeline');
	$this->Combinator->add_libs('js', 'timeline');
	$this->Combinator->add_libs('js', 'Dane.dataliner.js');

	echo $this->Element('dataobject/pageBegin');
		
?>


	<div class="prawo row">
	    <div class="col-lg-3 objectSide">
	        <div class="objectSideInner">
	            <ul class="dataHighlights side">
	            
	                
			
                    <? if( $object->getData('isap_status_str') ) {?>
                    <li class="dataHighlight">
                        <p class="_label">Status</p>
                        <p class="_value"><?= $object->getData('isap_status_str'); ?></p>
                    </li>
                    <? } ?>
                    
                    

                    <? if( $object->getData('data_wydania') && ( $object->getData('data_wydania')!='0000-00-00' ) ) {?>
                    <li class="dataHighlight">
                        <p class="_label">Data wydania</p>
                        <p class="_value"><?= $this->Czas->dataSlownie($object->getData('data_wydania')); ?></p>
                    </li>
                    <? } ?>

                    <? if( $object->getData('data_publikacji') && ( $object->getData('data_publikacji')!='0000-00-00' ) ) {?>
                    <li class="dataHighlight">
                        <p class="_label">Data publikacji</p>
                        <p class="_value"><?= $this->Czas->dataSlownie($object->getData('data_publikacji')); ?></p>
                    </li>
                    <? } ?>

                    <? if( $object->getData('data_wejscia_w_zycie') && ( $object->getData('data_wejscia_w_zycie')!='0000-00-00' ) ) {?>
                    <li class="dataHighlight">
                        <p class="_label">Data wejścia w życie</p>
                        <p class="_value"><?= $this->Czas->dataSlownie($object->getData('data_wejscia_w_zycie')); ?></p>
                    </li>
                    <? } ?>
                    
                    <? if( $tags = $object->getLayer('tags') ) {  $t = 0;?>
                    
                    <li class="dataHighlight topborder">
                        <p class="_label">Tematy</p>
                        <ul class="_value tags">
	                    <? foreach( $tags as $tag ) {?>
	                    	<li><a title="<?= addslashes( $tag['q'] ) ?>" class="label label-default" href="/dane/prawo/?haslo_id=<?= $tag['id'] ?>"><?= $tag['q'] ?></a></li>
	                    <? $t++; if($t==10) break;} ?>
                        </ul>
                    </li>
                    
                    <? } ?>
                    
                    <? if( $object->getData('sygnatura') ) {?>
                    <li class="dataHighlight topborder">
                        <p class="_label">Sygnatura</p>
                        <p class="_value"><?= $object->getData('sygnatura'); ?></p>
                    </li>
                    <? } ?>

                    
                    <li class="dataHighlight topborder">
		                <p class="_label">Źródło</p>
		
		                <p class="_value sources">
			            <?
				            $isap_str = 'W';
							if( $object->getData('zrodlo')=='DzU' )
								$isap_str .= 'DU';
							elseif( $object->getData('zrodlo')=='MP' )
								$isap_str .= 'MP';
								
							$isap_str .= $object->getData('rok');
							$isap_str .= str_pad($object->getData('nr'), 3, "0", STR_PAD_LEFT);
							$isap_str .= str_pad($object->getData('poz'), 4, "0", STR_PAD_LEFT);
			            ?>
			                <a href="http://isap.sejm.gov.pl/DetailsServlet?id=<?= $isap_str ?>" target="_blank">ISAP</a>
		                </p>
		            </li>
                    
                    
	            </ul>
	            	            
	        </div>
	    </div>
	
	
	    <div class="col-lg-9 objectMain">
	        <div class="object">
	        	
	        	<? if( $files = $object->getLayer('files') ) {?>
		           		<div id="tresc">
		           			<div class="row">
		           			<? foreach( $files as $file ) {?>
		           				<div class="col-md-<?= 12 / count($files) ?> text-center">
		           					
					   				<a class="megalink" href="/dane/prawo/<?= $object->getId() ?>/<?= $file['slug'] ?>" style="background-image: url(http://docs.sejmometr.pl/thumb/5/<?= $file['dokument_id'] ?>.png);">
					   					<div class="inner">
						   					<h2><?= $file['title'] ?></h2>
						   					<button class="btn btn-primary">Czytaj</button>
					   					</div>
					   				</a>
					   				
					   					           						
		           				</div>
		           			<? } ?>	
		           			</div>
		           		</div>
		           	<? } ?>
	        	
	        	<div class="block-group">
		           	
		           	
		           	
		           	<div class="block">
		           		<div class="block-header">
		           			<h2 class="label">Powiązane akty prawne</h2>
		           		</div>
		           		<div class="content">
				           	<div class="dataliner" data-params="<?= htmlspecialchars(json_encode(array(
				           		'requestsData' => array(
				           			'conditions' => array(
					           			'_source' => 'prawo.historia:' . $object->getId(),
				           			),
				           		),
				           		'initData' => array(
				           			array(
					           			'type' => 'blog_post',
						                'date' => $object->getDate(),
						                'title' => 'Opublikowanie pierwotnej wersji aktu',
										'content' => '<div class="row"><div class="col-md-2"><img style="max-width: 56px;" src="' . $object->getThumbnailUrl(3) . '" /></div><div class="col-md-10"><a href="/dane/prawo/' . $object->getId() . '">' . $object->getTitle() . '</a></div></div>',
						            ),
				           		), 
				           	))) ?>"></div>
		           		</div>
		           	</div>
		           	
	        	</div>

	           	
	           	<? /*
	           	          
	            <? if( 
	            	( $object->getData('typ_id')==1 ) && 
	            	( isset($counters_dictionary) ) && 
	            	( isset($counters_dictionary['akty_zmieniajace']) ) && 
	            	( $counters_dictionary['akty_zmieniajace'] )
	            ) { ?>
	            
	            <div class="alert alert-dismissable alert-info text-center">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<h4>Uwaga!</h4>
					<p>Poniżej widzisz treść ustawy, aktualną w momencie publikacji. Od tamtej pory, <a href="/dane/prawo/<?= $object->getId() ?>/akty_zmieniajace">tekst zmienił się <?= pl_dopelniacz($counters_dictionary['akty_zmieniajace'], 'raz', 'razy', 'razy') ?></a>.<br/> <a class="btn btn-xs btn-primary" href="/dane/prawo/<?= $object->getId() ?>/tekst_aktualny">Zobacz aktualną wersję tej ustawy &raquo;</a></p>
				</div>
				
				<? } ?>
	            
	            <?= $this->Document->place( $document ) ?>
	            
	            <? */ ?>
	            	
	
	        </div>
	    </div>
    </div>


<?=	$this->Element('dataobject/pageEnd'); ?>