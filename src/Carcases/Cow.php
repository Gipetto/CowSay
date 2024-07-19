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
	protected string $carcass = '
          \   ^__^
           \  ({eyes})\_______
              (__)\       )\/\\
               {tongue}  ||----{udder} |
                  ||     || {poop}';

	/**
	 * @return string
	 */
	protected function buildCarcass(): string {
		return strtr($this->carcass, [
			'{eyes}' => $this->getEyes(),
			'{tongue}' => $this->getTongue(),
			'{udder}' => $this->getUdder(),
			'{poop}' => $this->getPoop()
		]);
	}
}