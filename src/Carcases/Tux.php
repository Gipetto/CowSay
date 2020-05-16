<?php
declare(strict_types=1);

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
	protected function buildCarcass(): string {
		return $this->carcass;
	}

}