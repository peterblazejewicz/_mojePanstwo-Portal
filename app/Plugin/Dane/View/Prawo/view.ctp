<?

	$this->Combinator->add_libs('css', $this->Less->css('view-prawo', array('plugin' => 'Dane')));
	
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
	        	
	        	
	        	
	        	<? if( ($files = $object->getLayer('files')) && ($file = array_shift($files)) ) {?>
		        
				<a href="/dane/prawo/<?=$object->getId()?>/<?=$file['slug']?>" class="banner">
					<div class="row">
						<div class="col-md-5 cont img_cont">
							<img src="http://docs.sejmometr.pl/thumb/5/<?= $file['dokument_id'] ?>.png" />
						</div>
						<div class="col-md-6 cont text_cont">
							<p>Przeczytaj tekst aktualnie obowiązujący</p>
						</div>
						<div class="col-md-1 cont arrow_cont">
							<span class="glyphicon glyphicon-arrow-right"></span>
						</div>
					</div>
				</a>
		        
		        <? if( $file = array_shift($files) ) {?>
		        	<div class="banner_addon_cont">
			        	<a class="banner_addon" href="/dane/prawo/<?=$object->getId()?>/<?=$file['slug']?>"><?= $file['title'] ?> &raquo;</a>
		        	</div>
		        <? } ?>
	           	<? } ?>
		           	
		           	
	           	
	           	<div class="block">
	           		<div class="block-header">
	           			<h2 class="label">Powiązane akty prawne</h2>
	           		</div>
	           		<div class="content">
			           	<? echo $this->element('datasearcher', array(
			           		'params' => $datalinerParams,
			           		'options' => $object->getLayer('counters'),
			           	)); ?>
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