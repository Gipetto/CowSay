<?php
declare(strict_types=1);

namespace CowSay\Traits;


trait Poop {

	/**
	 * @var string
	 */
	protected string $poop = '';

	/**
	 * @param $poop
	 * @return $this
	 */
	public function setPoop(string $poop): self {
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