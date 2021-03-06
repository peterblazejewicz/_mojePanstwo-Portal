<div id="_mojePanstwoCockpit">
    <div class="_mojePanstwoCockpitContent">
        <div class="_mojePanstwoCockpitLogo">
            <p>
                <a href="/" target="_self">
                    <strong>_moje</strong>Państwo
                </a>
            </p>
        </div>

        <div class="_mojePanstwoCockpitMenuUp">
            <div id="_mojePanstwoCockpitMenuUpContent">
                <div
                    class="_mojePanstwoCockpitMenuUpContentButton _mojePanstwoCockpitIcons _mojePanstwoCockpitIcons-menuUp _mojePanstwoCockpitBorderLeft"
                    href="/"></div>
                <div id="_mojePanstwoCockpitMenuUpSubMenuTopArrow"></div>
                <div id="_mojePanstwoCockpitMenuUpSubMenu">
                    <?php if (!empty($applications['list'])) {
                        echo '<ul id="_mojePanstwoCockpitMenuUpSubMenuList"><li>';
                        foreach ($applications['list'] as $index => $app) {
                            if (($index % $applications['perPage'] == 0) && ($index != 0))
                                echo '</li><li>';

                            if ($app['Application']['type'] == 'app') {
                                ?>
                                <a class="appContruct" href="/<?= $app['Application']['slug'] ?>">
                                    <div class="_mojePanstwoCockpitMenuUpSubMenuListIcon">
                                        <div class="_mojePanstwoCockpitMenuUpSubMenuListIconInner">
                                            <img
                                                src="/<?= $app['Application']['plugin'] ?>/icon/<?= $app['Application']['slug'] ?>.svg"
                                                alt="<?= $app['Application']['name'] ?>"/>
                                        </div>
                                    </div>
                                    <div
                                        class="_mojePanstwoCockpitMenuUpSubMenuListName"><?= $app['Application']['name'] ?></div>
                                </a>
                            <?php } else if ($app['Application']['type'] == 'folder') { ?>
                                <div class="appContruct appFolder"
                                     data-folder-slug="/<?= $app['Application']['slug'] ?>">
                                    <div class="_mojePanstwoCockpitMenuUpSubMenuListIcon">
                                        <div class="_mojePanstwoCockpitMenuUpSubMenuListIconInner">
                                            <img src="/icon/folder.svg" alt="<?= $app['Application']['name'] ?>"/>
                                        </div>
                                    </div>
                                    <div
                                        class="_mojePanstwoCockpitMenuUpSubMenuListName"><?= $app['Application']['name'] ?></div>
                                    <ul class="appList">
                                        <?php foreach ($app['Content'] as $key => $appList) { ?>
                                            <li>
                                                <a href="/<?= $appList['slug'] ?>">
                                                    <div class="appIcon">
                                                        <div class="innerIcon">
                                                            <img
                                                                src="/<?= $appList['plugin'] ?>/icon/<?= $appList['slug'] ?>.svg"
                                                                alt="<?= $appList['name'] ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="appName"><?= $appList['name'] ?></div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php
                            }
                        }
                        echo '</li></ul>';
                    }?>
                    <div id="_mojePanstwoCockpitMenuUpSubMenuControls">
                        <a class="_mojePanstwoCockpitMenuUpSubMenuControlsArrow _mojePanstwoCockpitMenuUpSubMenuControlsArrowLeft"
                           href="javascript:void(0)" onclick="_mojePanstwoCockpitSlider.prevSlide();"><span>&lt;</span></a>

                        <p id="_mojePanstwoCockpitMenuUpSubMenuControlsList"></p>
                        <a class="_mojePanstwoCockpitMenuUpSubMenuControlsArrow _mojePanstwoCockpitMenuUpSubMenuControlsArrowRight"
                           href="javascript:void(0)" onclick="_mojePanstwoCockpitSlider.nextSlide();"><span>&gt;</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="_mojePanstwoCockpitBreadcrumb _mojePanstwoCockpitBorderLeft">
            <?php if (isset($applicationCurrent)) { ?>
                <a class="_mojePanstwoCockpitBreadcrumbMain"
                   href="/<?php echo $applicationCurrent['Application']['slug'] ?>">
                    <img
                        src="/<?php echo $applicationCurrent['Application']['plugin'] ?>/icon/<?php echo $applicationCurrent['Application']['slug'] ?>.svg"
                        alt="<?php echo $applicationCurrent['Application']['name']; ?>"/>

                    <p><?php echo $applicationCurrent['Application']['name']; ?></p>
                </a>
            <?php } ?>

            <?
            if (!empty($applicationCrumbs)) {
                foreach ($applicationCrumbs as $crumb) {
                    if (!isset($crumb['href']))
                        $crumb['href'] = 'javascript:void(0)';

                    echo ' <span class="_mojePanstwoCockpitBreadcrumbSeparator">/</span> ';

                    if ($crumb['href'])
                        echo '<a href="' . $crumb['href'] . '" class="_mojePanstwoCockpitBreadcrumbBarCrumb">';
                    else
                        echo '<span class="_mojePanstwoCockpitBreadcrumbBarCrumb">';

                    echo $crumb['text'];

                    if ($crumb['href'])
                        echo '</a>';
                    else
                        echo '</span>';

                }
            }
            ?>

        </div>
        <div class="_mojePanstwoCockpitPower">
            <?php if ($this->Session->read('Auth.User.id')) { ?>
                <a class="_mojePanstwoCockpitPowerButton _mojePanstwoCockpitIcons _mojePanstwoCockpitIcons-logout _mojePanstwoCockpitBorderLeft"
                   href="<?php echo $this->Html->url(array('plugin' => 'paszport', 'controller' => 'users', 'action' => 'logout')); ?>">
                    <span><?php echo __('LC_COCKPITBAR_LOGOUT'); ?></span>
                </a>
            <?php } else { ?>
                <a class="_mojePanstwoCockpitPowerButton _mojePanstwoCockpitIcons _mojePanstwoCockpitIcons-login _mojePanstwoCockpitBorderLeft"
                   href="<?php echo $this->Html->url(array('plugin' => 'paszport', 'controller' => 'pages', 'action' => 'home')); ?>">
                    <span><?php echo __('LC_COCKPITBAR_LOGIN'); ?></span>
                </a>
            <?php } ?>
        </div>


        <?php if ($this->Session->read('Auth.User.id')) { ?>
            <div class="_mojePanstwoCockpitNotify">
                <a class="_mojePanstwoCockpitNotifyButton _mojePanstwoCockpitIcons _mojePanstwoCockpitIcons-notify _mojePanstwoCockpitBorderLeft"
                   href="<?php echo $this->Html->url(array('plugin' => 'powiadomienia', 'controller' => 'powiadomienia', 'action' => 'index')); ?>">
                    <?php if ($this->Session->read('Auth.User.unread_count') > 0) { ?>
                    <span title="<?php echo $this->Session->read('Auth.User.unread_count'); ?>">!</span><?php } ?>
                </a>
            </div>

            <div
                class="_mojePanstwoCockpitUser <?php echo (count($streams) > 1) ? "_mojePanstwoCockpitUserNameDropdown" : null; ?>">
                <div class="_mojePanstwoCockpitUserName">
                    <a href="<?php echo $this->Html->url(array('plugin' => 'paszport', 'controller' => 'users', 'action' => 'index')); ?>"><?php echo $this->Session->read('Auth.User.username'); ?></a>
                </div>
                <div class="_mojePanstwoCockpitUserAvatar">
                    <img src="<?php echo $this->Session->read('Auth.User.photo_small'); ?>" class="img img-circle"/>
                </div>
                <?php if (count($streams) > 1) { ?>
                    <ul id="_mojePanstwoCockpitUserNameDropdownList">
                        <li class="_mojePanstwoCockpitUserNameDropdownListStream">Streams
                            <ul class="_mojePanstwoCockpitUserNameDropdownListSubList">
                                <?php foreach ($streams as $id => $name) { ?>
                                    <li data-stream-id="<?php echo $id; ?>"><a
                                            href="<?php echo $this->Html->url(array('plugin' => 'paszport', 'controller' => 'users', 'action' => 'switchstreams', $id)); ?>"><?php echo $name; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>