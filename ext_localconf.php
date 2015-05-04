<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
// Adding scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Cretection\\CrtDevipmask\\Task\\Pinger'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'Pinger',
	'description'      => 'Pinger',
	'additionalFields' => 'Cretection\\CrtDevipmask\\Task\\PingerAdditionalFieldProvider',
);


$getLastIP = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('lastip', 'tx_crtdevipmask_ip','uid = 0');
var_dump($getLastIP);
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = $getLastIP;