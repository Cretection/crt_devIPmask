<?php
namespace Cretection\CrtDevipmask\Task;
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
/**

 *

 */
class Pinger extends \TYPO3\CMS\Scheduler\Task\AbstractTask {
	/**
	 * URL
	 *
	 * @var string
	 */
	public $url;
	/**
	 * Function execute from the Scheduler
	 *
	 * @return bool TRUE on successful execution, FALSE on error
	 */
	public function execute() {
		$checkUrl = $this->url;
		$parse = parse_url($checkUrl);
		$ip = gethostbynamel($parse[host]);
		$ipInsert = array (
			'lastip' => $ip[0],
		);
		$uidCheck = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid', 'tx_crtdevipmask_ip','uid = 0');
		
		if($uidCheck){
			$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_crtdevipmask_ip','uid = 0', $ipInsert);
		} else {
			$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_crtdevipmask_ip', $ipInsert);
		}
		$getLastIP = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('lastip', 'tx_crtdevipmask_ip','uid = 0');
		echo($getLastIP[0][lastip]);
		$test = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager')->getLocalConfigurationValueByPath('DB/host')
		echo($test);
		return true;
	}
	/**
	 * This method returns the configured URL as additional information
	 *
	 * @return string
	 */
	public function getAdditionalInformation() {
		$message = sprintf(
			$GLOBALS['LANG']->sL('LLL:EXT:crt_devipmask/Resources/Private/Language/locallang.xlf:label.getUrl.additionalInformationUrl'),
			$this->url
		);
		return $message;
	}
}