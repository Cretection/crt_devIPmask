<?php
   namespace TYPO3\CrtDevipmask\Task;
   
   class Task extends \TYPO3\CMS\Scheduler\Task\AbstractTask {
      public function execute() {
         //dein code mit fehlerabfragen etc.
         return TRUE; //ende gut, alles gut?
      }
   }
?>