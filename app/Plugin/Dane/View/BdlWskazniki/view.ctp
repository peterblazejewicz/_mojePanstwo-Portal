<?php $this->Combinator->add_libs('css', $this->Less->css('view-bdl-wskazniki', array('plugin' => 'Dane'))); ?>

<?php $this->Combinator->add_libs('js', 'highcharts/highcharts'); ?>
<?php $this->Combinator->add_libs('js', 'highcharts/locals'); ?>
<?php $this->Combinator->add_libs('js', 'Dane.view-bdl-wskazniki'); ?>

<?= $this->Element('dataobject/pageBegin'); ?>
<?= $this->Element('bdl_select', array('expand_dimension' => $expand_dimension, 'dims' => $dims)); ?>

    <div id="bdl-wskazniki">
        <div class="object">

            <?
            if (!empty($expanded_dimension)) {
                foreach ($expanded_dimension['options'] as $option)
                {
                	if( isset($option['data']) )
                	{
            ?>
										
                    <div class="wskaznik" data-dim_id="<?= $option['data']['id'] ?>">
                        <h2>
                            <a href="<?= $this->here ?>/<?= $option['data']['id'] ?>"><?= trim($option['value']) ?></a>
                        </h2>

                        <div class="stats">
                            <div class="map">
                                <a href="<?= $this->here ?>/<?= $option['data']['id'] ?>">
                                    <img width="216" height="200"
                                         src="http://resources.sejmometr.pl/bdl_wymiary_kombinacje/bdl_wymiary_kombinacje_<?= $option['data']['id'] ?>.png"
                                         class="imageInside"/>
                                </a>
                            </div>
                            <div class="charts">
                                <div class="head">
                                    <p class="vp">
                                        <span class="v"><?= number_format($option['data']['lv'], 2, ',', ' ') ?></span>
                                        <span class="u"><?= $option['data']['jednostka'] ?></span>
                                        <span
                                            class="y"><?= __d('dane', 'LC_BDL_WSKAZNIKI_LASTYEAR', array($option['data']['ly'])) ?></span>
                                    </p>

                                    <p class="fp">
                                        <span class="factor <? if (intval($option['data']['dv']) < 0) {
                                            echo "d";
                                        } else {
                                            echo "u";
                                        } ?>">
                                            <?= $option['data']['dv'] ?> %
                                        </span>
                                        <span class="i">
                                            <?= __d('dane', 'LC_BDL_WSKAZNIKI_PREVLASTYEAR', array($option['data']['ply'])) ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="chart">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="45"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 15%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?
                	}
                }
            }
            ?>

        </div>
    </div>

<?= $this->Element('dataobject/pageEnd'); ?>