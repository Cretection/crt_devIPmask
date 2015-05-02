<?php
 namespace TYPO3\CMS\Crtdevipmask\Task;

 class Task extends \TYPO3\CMS\Scheduler\Task\AbstractTask {

    /**
     * Function executed from the Scheduler.
     * Sends an email
     *
     * @return boolean
     */
     public function execute() {

        //Your logic to perform
        return TRUE;
     }
  }
?>