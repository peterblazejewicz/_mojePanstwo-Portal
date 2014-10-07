<?php
Router::connect('/prawo', array('plugin' => 'prawo', 'controller' => 'prawo', 'action' => 'index'));
Router::connect('/prawo/szukaj', array('plugin' => 'prawo', 'controller' => 'prawo', 'action' => 'search'));
Router::connect('/prawo/:action', array('plugin' => 'prawo', 'controller' => 'prawo'));