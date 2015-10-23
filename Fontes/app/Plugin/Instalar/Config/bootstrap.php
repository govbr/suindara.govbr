<?php
/**
* Path constants
*/
define('CONFIG', APP. 'Config' .DS);
define('PLUGIN_CONFIG', APP. 'Plugin' .DS. 'Instalar' .DS. 'Config' .DS);


/**
* Database installation variable
* if set to TRUE, the database is installed
* if set to FALSE, the databse is not installed
*/
Configure::write('Database.installed', 'false');
