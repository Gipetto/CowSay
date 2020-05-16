<?php
declare(strict_types=1);

namespace CowSay;

/**
 * Class Sheep.
 * Baa!
 *
 * @package CowSay
 */
class Sheep extends \CowSay\Core\Calf {

	protected $carcass = '
    \
     \
       __
      UooU\.\'@@@@@@`.
      \__/(@@@@@@@@@@)
           (@@@@@@@@)
           `YY~~~~YY\'
            ||    ||';

	/**
	 * @return string
	 */
	protected function buildCarcass(): string {
		return $this->carcass;
	}

}


