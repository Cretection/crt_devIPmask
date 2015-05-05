<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
// Adding scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Cretection\\CrtDevipmask\\Task\\Setdevipmask'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'Set SYS/devIPmask',
	'description'      => 'Set SYS/devIPmask by dynamic URL (IPv4)',
	'additionalFields' => 'Cretection\\CrtDevipmask\\Task\\SetdevipmaskAdditionalFieldProvider',
);