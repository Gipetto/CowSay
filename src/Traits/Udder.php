<?php

namespace CowSay\Traits;


trait Udder {

	/**
	 * @var string
	 */
	protected $udder = 'w';

	/**
	 * @param $udder
	 * @returns $this
	 */
	public function setUdder($udder): self {
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