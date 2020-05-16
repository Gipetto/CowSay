<?php
declare(strict_types=1);

namespace CowSay;

/**
 * Class Bear
 * I had to write this for the `Carcasses.md` demo, might as well include it.
 *
 * @package CowSay
 */
class Bear extends \CowSay\Core\Calf {

	/**
	 * Include the Eyes Trait
	 */
	use \CowSay\Traits\Eyes;

	/**
	 * Our carcass string with sprintf string placeholder for the eyes
	 * @var string
	 */
	protected $carcass = <<<BEAR

     \
      \ _     _
       (o\---/o)
        ( %s )
       _( (T) )_
      / /     \ \
     / /       \ \
     \_)       (_/
       \   _   /
       _)  |  (_
      (___,'.___)
BEAR;

	/**
	 * PHP Traits and properties aren't perfect. In order to properly default the
	 * eyes we need to set them as a default in the constructor.
	 *
	 * @see http://php.net/traits#language.oop5.traits.properties
	 *
	 * @param string $message
	 * @param int $maxLen
	 */
	public function __construct($message = '', $maxLen = self::DEFAULT_MAX_LEN) {
		parent::__construct($message, $maxLen);
		$this->setEyes('. .');
	}

	/**
	 * Ensure the space between the eyes (normal carcasses have the eyes jammed
	 * together and only occupy 2 spaces)
	 * 
	 * @param $eyes
	 * @return $this
	 */
	public function setEyes($eyes): self {
		if (strlen($eyes) == 1) {
			$eyes .= ' ' . $eyes;
		}

		if (strlen($eyes) > 3) {
			$eyes = substr($eyes, 0, 3);
		}

		$this->eyes = $eyes;
		return $this;
	}

	/**
	 * Use sprintf to do variable replacement on the carcass
	 *
	 * @see http://php.net/sprintf
	 *
	 * @return string
	 */
	protected function buildCarcass(): string {
		return sprintf($this->carcass, $this->getEyes());
	}
}
