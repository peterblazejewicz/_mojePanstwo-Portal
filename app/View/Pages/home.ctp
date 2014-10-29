<?php $this->Combinator->add_libs('css', $this->Less->css('home')) ?>
<?php $this->Combinator->add_libs('js', 'home') ?>

<div id="home" class="fullPageHeight noRestriction"
     style="background-image: url('./img/home_backgrounds/home-background-default.png')">
    <div class="grid">
        <ul>
            <li data-x="0" data-y="0" data-col="2">Zamówienia publiczne</li>
            <li data-x="0" data-y="2" data-col="2">Ustawy</li>
            <li data-x="2" data-y="3" data-row="3">Wniosek</li>
            <li data-x="7" data-y="1" data-row="2" data-col="2">Dochody</li>
        </ul>
    </div>
    <div class="options">
        <ul>
            <li><a href="#" target="_self">O Portalu</a></li>
            <li><a href="#" target="_self">API</a></li>
            <li><a href="#" target="_self">Regulamin</a></li>
            <li><a href="#" target="_self">Zgłoś błąd</a></li>
            <li class="last"><a href="#" target="_self">Personalizuj</a></li>
        </ul>
    </div>
</div>