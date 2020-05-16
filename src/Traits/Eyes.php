<?php
declare(strict_types=1);

namespace CowSay\Traits;


trait Eyes {

	/**
	 * @var string
	 */
	protected $eyes = 'oo';

	/**
	 * Set the eyes. Make sure we have 2.
	 * @param $eyes
	 * @return $this
	 */
	public function setEyes(string $eyes) {
		if (strlen($eyes) == 1) {
			$eyes .= $eyes;
		}

		if (strlen($eyes) > 2) {
			$eyes = substr($eyes, 0, 2);
		}

		$this->eyes = $eyes;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEyes(): string {
		return $this->eyes;
	}
}