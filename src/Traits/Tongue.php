<?php
declare(strict_types=1);

namespace CowSay\Traits;


trait Tongue {

	/**
	 * @var string
	 */
	protected string $tongue = ' ';

	/**
	 * @param $tongue
	 * @return $this
	 */
	public function setTongue(string $tongue = 'U'): self {
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