<?php

namespace CowSay;

/**
 * Class Tux.
 * Penguins are simple creatures. No Traits.
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


