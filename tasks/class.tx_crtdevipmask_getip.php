<?php
class tx_crtdevipmask_getip extends tx_scheduler_Task {
	public function execute() {
		$fp = @fsockopen('typo3.sfroemken.de', 80, $errno, $errstr, 15);
		if(!$fp) {
			mail('meine@mailadresse.de', 'Server Error', 'Fehler: '.$errstr.'<br />Fehlernummer: '.$errno);
			return false;
		} else return true;
	}
}
?>