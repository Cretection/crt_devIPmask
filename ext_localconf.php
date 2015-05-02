<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
// Adding scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Cretection\\CrtDevipmask\\Task\\Pinger'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'Pinger',
	'description'      => 'Pinger',
	//'additionalFields' => 'WebentwicklerAt\\SchedulerHttp\\Task\\GetUrlTaskAdditionalFieldProvider',
);