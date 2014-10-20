<?php
Router::connect( '/prawo', array( 'plugin' => 'prawo', 'controller' => 'prawo', 'action' => 'start' ) );
Router::connect( '/prawo/szukaj', array( 'plugin' => 'prawo', 'controller' => 'prawo', 'action' => 'search' ) );
Router::connect( '/prawo/:action', array( 'plugin' => 'prawo', 'controller' => 'prawo' ) );