<?php

namespace CowSay\Traits;


trait Poop {

	/**
	 * @var string
	 */
	protected $poop;

	/**
	 * @param $poop
	 * @return $this
	 */
	public function setPoop($poop) {
		$this->poop = $poop;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPoop() {
		return $this->poop;
	}
}