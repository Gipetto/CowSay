<?php

namespace CowSay;

/**
 * Class Tux.
 * Penguins are simple creatures. No Traits.
 *
 * @package CowSay
 */
class Tux extends \CowSay\Core\Calf {

    protected $carcass = '
     \
      \
        .--.
       |o_o |
       |:_/ |
      //   \ \
     (|     | )
    /\'\_   _/`\
    \___)=(___/';

	/**
	 * @return string
	 */
	public function buildCarcass(): string {
		return $this->carcass;
	}

}