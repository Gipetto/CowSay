<?php

namespace CowSay;


/**
 * Class Cow
 * Moo.
 *
 * @package CowSay
 */
class Cow extends Calf {

	use Traits\Eyes;
	use Traits\Tongue;
	use Traits\Udder;
	use Traits\Poop;

	/**
	 * @var string cow!
	 */
	protected $carcass = '
          \   ^__^
           \  (%s)\_______
              (__)\       )\/\\
               %s  ||----%s |
                  ||     || %s';

	/**
	 * @return string
	 */
	public function buildCarcass() {
		return sprintf($this->carcass, $this->getEyes(), $this->getTongue(), $this->getUdder(), $this->getPoop());
	}
}