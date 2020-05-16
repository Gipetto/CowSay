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
	public function setTongue($tongue = 'U'): self {
		$this->tongue = strlen($tongue) ? $tongue[0] : ' ';
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTongue(): string {
		return $this->tongue;
	}
}