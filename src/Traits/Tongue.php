<?php

namespace CowSay\Traits;


trait Tongue {

	/**
	 * @var string
	 */
	protected $tongue = ' ';

	/**
	 * @param $tongue
	 * @return $this
	 */
	public function setTongue($tongue = 'U') {
		$this->tongue = strlen($tongue) ? $tongue[0] : ' ';
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTongue() {
		return $this->tongue;
	}
}