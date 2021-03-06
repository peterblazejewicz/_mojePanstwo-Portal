<?php $this->Combinator->add_libs('css', $this->Less->css('htmlexDocMain')); ?>
<?php $this->Combinator->add_libs('css', $this->Less->css('htmlexDoc', array('plugin' => 'Dane'))); ?>
<?php $this->Combinator->add_libs('js', 'toolbar'); ?>

<?php echo $this->Html->css($document->getCSSLocation()); ?>

<?= $this->Element('dataobject/pageBegin'); ?>

    <div class="htmlexDoc" data-packages="<?php echo $document->getPackagesCount(); ?>"
         data-current-package="<?php echo $documentPackage; ?>"
         data-pages="<?php echo $document->getPagesCount(); ?>"
         data-document-id="<?php echo $object->getId(); ?>"
         data-dataset="<?php echo $dataset['Dataset']['alias']; ?>">

        <?= $this->Element('toolbar'); ?>

        <div class="document container">
            <div class="row">
                <div class="content col-md-10">
                    <div class="canvas">
                        <?php echo $document->loadHtml($documentPackage) ?>
                    </div>
                    <div class="loadMoreDocumentContent <?php if ($document->getPackagesCount() > 1) {
                        echo 'show';
                    } else {
                        echo 'hide';
                    } ?>"></div>
                </div>

                <? if (!empty($docs) && is_array($docs)) { ?>
                    <div class="sidebox col-md-2">
                        <ul class="categories">
                            <? foreach ($docs as $category) { ?>
                                <li>
                                    <? if (@$category['nazwa'] && @$category['files']) { ?>
                                        <h2><?= ucfirst($category['nazwa']) ?>
                                        :</h2><? } ?>
                                    <ul class="files<? if (!$category['nazwa']) { ?> separator<? } ?>">
                                        <? foreach ($category['files'] as $file) {
                                            $file = $file['files']; ?>
                                            <li<? if ($file['dokument_id'] == $document->getId()) { ?> class="s"<? } ?>>
                                                <a href="?f=<?= $file['dokument_id'] ?>"><?= $file['nazwa']; ?></a>
                                            </li>
                                        <? } ?>
                                    </ul>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>

<?= $this->Element('dataobject/pageEnd'); ?>