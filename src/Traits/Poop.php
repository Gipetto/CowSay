<?php
declare(strict_types=1);

namespace CowSay\Traits;


trait Poop {

	/**
	 * @var string
	 */
	protected $poop = '';

	/**
	 * @param $poop
	 * @return $this
	 */
	public function setPoop(string $poop) {
		$this->poop = $poop;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPoop(): string {
		return $this->poop;
	}
}