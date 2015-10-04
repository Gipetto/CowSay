<?php

namespace CowSay;

/**
 * Class Sheep.
 * Baa!
 *
 * @package CowSay
 */
class Sheep extends Calf {

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
	public function buildCarcass() {
		return $this->carcass;
	}

}


