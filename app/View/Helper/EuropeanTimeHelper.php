<?php
App::uses('AppHelper', 'View/Helper');

class EuropeanTimeHelper extends AppHelper {
    public $helpers = array('Time');

    public function createEUdate($date) {
        $converted = $this->Time->format('d-m-Y', $date);
        return $converted;
    }

	public function createEUdateTime($dateTime) {
		$converted = $this->Time->format('d-m-Y h:m', $dateTime);
		return $converted;
	}
}