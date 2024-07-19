<?php
declare(strict_types=1);

namespace CowSay;

use CowSay\Core\TraitGetter;
use \ReflectionObject;

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
}