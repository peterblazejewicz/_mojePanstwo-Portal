<?
$this->Combinator->add_libs('css', $this->Less->css('view-poslowie', array('plugin' => 'Dane')));
echo $this->Element('dataobject/pageBegin');
?>

<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>Kraj</th>
        <th>Wydarzenie</th>
        <th>Koszt</th>
        <th style="min-width: 7em;">Od</th>
        <th style="min-width: 7em;">Do</th>
        <th>Miejsce</th>
    </tr>
    </thead>
    <tbody>
    <? foreach( $object->getLayer('wyjazdy') as $ev) { ?>
    <tr>
        <td><?= $ev['kraj'] ?></td>
        <td><?= $ev['delegacja'] ?></td>
        <td style="text-align: right;"><?= $ev['koszt_suma'] ?></td>
        <td><?= $ev['od'] ?></td>
        <td><?= $ev['do'] ?></td>
        <td><?= $ev['miasto'] ?></td>
    </tr>
    <? } ?>
    </tbody>
</table>

<?
echo $this->Element('dataobject/pageEnd');
?>