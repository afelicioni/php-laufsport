<?php
class Laufsport {
	private $distance = 0;
	private $time = 0;
	private $averagespeed = 0;
	public function addDistance($nUnits = 0, $sUOM = NULL) {
		switch ($sUOM) {
			case 'km': // kilometers
				$this->distance += ($nUnits * 1000);
				break;
			case 'mi': // miles
				$this->distance += ($nUnits * 1609.344);
				break;
			default: // meters
				$this->distance += $nUnits;
		}
		if ($this->time > 0) {
			$this->setAverageSpeed();
		}
	}
	public function addTime($nUnits = 0, $sUOM = NULL) {
		switch ($sUOM) {
			case 'H': // hours
				$this->time += ($nUnits * 3600);
				break;
			case 'i': // minutes
				$this->time += ($nUnits * 60);
				break;
			case 's': // seconds
			default: // seconds
				$this->time += $nUnits;
		}
		if ($this->time > 0) {
			$this->setAverageSpeed();
		}
	}
	private function setAverageSpeed() {
		$this->averagespeed = $this->distance / $this->time;
	}
	public function getAverageSpeed($sUOM = NULL) {
		$speed = 0;
		switch ($sUOM) {
			case 'kmh': // km/h
				$speed = $this->averagespeed * 3.6;
				break;
			case 'mih': // mi/h
				$speed = $this->averagespeed * 2.237;
				break;
			default: // m/sec
				$speed = $this->averagespeed;
		}
		return $speed;
	}
	public function getPace($sUOM = NULL) {
		$pace = 0;
		switch ($sUOM) {
			case 'minpermi': // minutes per mile
				$pace = ($this->time/60) / ($this->distance/1609.344);
				break;
			case 'minperkm': // minutes per kilometer
			default: // minutes per kilometer
				$pace = ($this->time/60) / ($this->distance/1000);
		}
		return $pace;
	}
}