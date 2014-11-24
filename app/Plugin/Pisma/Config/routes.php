<?php

$pisma_prefix = '/pisma';

Router::connect("$pisma_prefix", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'home',
    '[method]' => 'GET'
));
Router::connect("$pisma_prefix/moje", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'my',
    '[method]' => 'GET'
));
Router::connect("$pisma_prefix/nowe", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'add',
    '[method]' => 'POST'
));
Router::connect("$pisma_prefix/nowe", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'editor',
    '[method]' => 'GET'
));
Router::connect("$pisma_prefix/:id", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'edit'
), array('id' => '[0-9]+', 'pass' => array('id')));

Router::connect("$pisma_prefix/:id/delete", array(
    'plugin' => 'Pisma',
    'controller' => 'Pisma',
    'action' => 'delete'
), array('id' => '[0-9]+', 'pass' => array('id')));

Router::connect("$pisma_prefix/szablony/:id", array(
    'plugin' => 'Pisma',
    'controller' => 'Szablony',
    'action' => 'view'
), array('id' => '[0-9]+', 'pass' => array('id')));
