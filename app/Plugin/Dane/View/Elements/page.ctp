<?
$path = App::path('Plugin');
$file = $path[0] . '/Dane/View/Elements/' . $theme . '/' . $object->getDataset() . '.ctp';
$file_exists = file_exists($file);

if (in_array($object->getDataset(), array('rady_posiedzenia', 'rady_gmin_debaty', 'rady_gmin_wystapienia'))) {
    $object_content_sizes = array(3, 9);
} else {
    $object_content_sizes = array(2, 10);
}

$this->Dataobject->setObject($object);
?>
<div class="objectRender col-md-12 <?php echo $object->getDataset(); ?>" oid="<?php echo $item['data']['id'] ?>">
    <div class="row">
        <? if ($this->Dataobject->getDate()) { ?>
            <div class="formatDate col-md-1">
                <?php echo($this->Dataobject->getDate()); ?>
            </div>
        <? } ?>
        <div class="data col-md-<?= $this->Dataobject->getDate() ? '11' : '12' ?>">
            <div class="row">
                <? if ($object->getThumbnailUrl('1')) { ?>
                    <div class="attachment col-md-<?= $object_content_sizes[0] ?> text-center">
                        <?php if ($object->getUrl() != false) { ?>
                        <a href="<?= $object->getUrl() ?>">
                            <?php } ?>
                            <img onerror="imgFixer(this)" src="<?= $object->getThumbnailUrl('1') ?>"
                                 alt="<?= strip_tags($object->getTitle()) ?>"/>
                            <?php if ($object->getUrl() != false) { ?>
                        </a>
                    <?php } ?>
                    </div>
                    <div class="content col-md-<?= $object_content_sizes[1] ?>">
                        <p class="header">
                            <?= $object->getLabel(); ?>
                        </p>

                        <? if ($object->getShortTitle()) { ?>
                            <h1 class="title trimTitle" title="<?= htmlspecialchars($object->getShortTitle()) ?>"
                                data-trimlength="200">
                                <?php if (($object->getUrl() != false) && !empty($this->request)) { ?>
                                <a href="<?= $object->getUrl() ?>" title="<?= strip_tags($object->getTitle()) ?>">
                                    <?php } ?>
                                    <?= $object->getShortTitle() ?>
                                    <?php if (($object->getUrl() != false) && !empty($this->request)) { ?>
                                </a> <? if($object->getTitleAddon()) echo '<small>' . $object->getTitleAddon() . '</small>'; ?>
                            <?php } ?>
                            </h1>
                        <? } ?>

                        <?
                        if ($file_exists)
                            echo $this->element('Dane.' . $theme . '/' . $object->getDataset(), array(
                                'item' => $item,
                                'object' => $object
                            ));
                        else
                        	echo $this->Dataobject->highlights( $hlFields );
                        ?>
                    </div>

                <? } else { ?>
                    <div class="content">
                        <p class="header">
                            <?= $object->getLabel(); ?>
                        </p>

                        <h1 class="title">
                            <?php if ($object->getUrl() != false){ ?>
                            <a class="trimTitle" href="<?= $object->getUrl() ?>"
                               title="<?= strip_tags($object->getTitle()) ?>">
                                <?php } ?>
                                <?= $object->getShortTitle() ?>
                                <?php if ($object->getUrl() != false){ ?>
                            </a> <? if($object->getTitleAddon()) echo '<small>' . $object->getTitleAddon() . '</small>'; ?>
                        <?php } ?>
                        </h1>
                        <?
                        if ($file_exists)
                            echo $this->element('Dane.' . $theme . '/' . $object->getDataset(), array(
                                'item' => $item,
                                'object' => $object
                            ));
                        else
                        	echo $this->Dataobject->highlights( $hlFields );
                        ?>

                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>