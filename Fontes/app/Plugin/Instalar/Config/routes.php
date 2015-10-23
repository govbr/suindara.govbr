<?php
/**
* Routes configuration
*
* If you want to launch the plugin on /, on the first install,
* just paste the line CakePlugin::routes() above your routes commands in app/Config/routes.php
*/
if (Configure::read('Database.installed') == 'false') {
    Router::connect('/instalar', array('plugin' => 'Instalar', 'controller' => 'install', 'action' => 'index'));
    Router::connect('/instalar/:action', array('plugin' => 'Instalar', 'controller' => 'install'));
    //Router::connect('/*', array('plugin' => 'install', 'controller' => 'install'));
}