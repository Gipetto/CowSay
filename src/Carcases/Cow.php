<?php
declare(strict_types=1);

namespace CowSay;


/**
 * Class Cow
 * Moo.
 *
 * @package CowSay
 */
class Cow extends \CowSay\Core\Calf {

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
	protected function buildCarcass(): string {
		return sprintf($this->carcass, $this->getEyes(), $this->getTongue(), $this->getUdder(), $this->getPoop());
	}
}