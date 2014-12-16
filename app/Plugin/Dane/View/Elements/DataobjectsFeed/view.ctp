<div class="dataBrowser dataFeed">
	<div class="dataObjects">
		<div class="innerContainer update-objects">
		    
		    <?
			if (isset($objects)) {
			    if (empty($objects)) {
			        echo '<p class="noResults">' . __d('dane', 'LC_DANE_BRAK_WYNIKOW') . '</p>';
			    } else {
			        ?>
			        <ul class="list-group list-dataobjects">
			            <?
			            foreach ($objects as $object) {
							
							$theme = 'feed/' . $preset . '/' . $object->getDataset();
							
			                echo $this->Dataobject->render($object, 'feed', array(
			                    // 'hlFields' => $dataBrowser->hlFields,
			                    // 'hlFieldsPush' => $dataBrowser->hlFieldsPush,
			                    // 'routes' => $dataBrowser->routes,
			                    'forceLabel' => false,
			                    'file' => 'feed/' . $preset . '/' . $object->getDataset(),
			                    // 'defaults' => $defaults,
			                ));
			                				                
			            }
			            ?>
			        </ul>
			    <?
			    }
			}
			?>
		    
		</div>     
	</div>     
</div>