<?php
declare(strict_types=1);

namespace CowSay\Traits;


trait Udder {

	/**
	 * @var string
	 */
	protected string $udder = 'w';

	/**
	 * @param $udder
	 * @returns $this
	 */
	public function setUdder(string $udder): self {
		$this->udder = $udder;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUdder(): string {
		return $this->udder;
	}
}