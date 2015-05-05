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
class SetdevipmaskAdditionalFieldProvider implements \TYPO3\CMS\Scheduler\AdditionalFieldProviderInterface {
	protected $defaults = array(
		'url' => 'http://www.cretection.eu/',
	);
	public function getAdditionalFields(array &$taskInfo, $task, \TYPO3\CMS\Scheduler\Controller\SchedulerModuleController $schedulerModule) {
		$fieldId = 'url';
		if (!isset($taskInfo[$fieldId])) {
			$taskInfo[$fieldId] = $this->defaults[$fieldId];
			if ($schedulerModule->CMD === 'edit') {
				$taskInfo[$fieldId] = $task->$fieldId;
			}
		}
		$additionalFields[$fieldId] = array(
			'code'  => '<input type="text" name="tx_scheduler[' . $fieldId . ']" id="' . $fieldId . '" value="' . htmlspecialchars($taskInfo[$fieldId]) . '" size="60" />',
			'label' => 'LLL:EXT:crt_devipmask/Resources/Private/Language/locallang.xlf:label.getUrlTaskAdditionalFieldProvider.' . $fieldId,
		);
		return $additionalFields;
	}
	public function validateAdditionalFields(array &$submittedData, \TYPO3\CMS\Scheduler\Controller\SchedulerModuleController $schedulerModule) {
		$validData = TRUE;
		if (!\TYPO3\CMS\Core\Utility\GeneralUtility::isValidUrl($submittedData['url'])) {
			$validData = FALSE;
		}
		return $validData;
	}
	public function saveAdditionalFields(array $submittedData, \TYPO3\CMS\Scheduler\Task\AbstractTask $task) {
		$task->url = $submittedData['url'];
	}
}