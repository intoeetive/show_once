<?php

if ( ! defined('SHOW_ONCE_ADDON_NAME'))
{
	define('SHOW_ONCE_ADDON_NAME',         'Show Once');
	define('SHOW_ONCE_ADDON_VERSION',      '0.1.0');
}

$config['name']=SHOW_ONCE_ADDON_NAME;
$config['version']=SHOW_ONCE_ADDON_VERSION;

$config['nsm_addon_updater']['versions_xml']='http://www.intoeetive.com/index.php/update.rss/141';