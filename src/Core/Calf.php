<?php

namespace CowSay\Core;


/**
 * Class Calf
 * @package CowSay
 *
 * @method $this getEyes
 * @method $this getTongue
 * @method $this getUdder
 */
abstract class Calf {

	const DEFAULT_MAX_LEN = 50;

	/**
	 * @var string carcass!
	 */
	protected $carcass;

	/**
	 * @var string message to display
	 */
	protected $message;

	/**
	 * @var string max length of output lines
	 */
	protected $maxLen;

	/**
	 * @var string longest length of output lines found
	 */
	protected $strLen = 0;

	/**
	 * @param $message
	 * @param int $maxLen
	 */
	public function __construct($message = '', $maxLen = self::DEFAULT_MAX_LEN) {
		$this->setMessage($message);
		$this->setMaxLen($maxLen);
	}

	/**
	 * Output the Complete message and cow.
	 *
	 * @return string
	 */
	public function say() {
		return $this->formatMessage() . $this->buildCarcass();
	}

	/**
	 * Return the cow template with eyes & tongue replaces
	 *
	 * @return string
	 */
	abstract public function buildCarcass();

	/**
	 * @param $maxLen
	 * @returns $this;
	 */
	public function setMaxLen($maxLen) {
		$this->maxLen = intVal($maxLen);

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMaxLen() {
		return $this->maxLen;
	}

	/**
	 * @param $message
	 * @returns $this
	 */
	public function setMessage($message) {
		$this->message = $message;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param $strLen
	 * @return $this
	 */
	public function setStrLen($strLen) {
		$this->strLen = intVal($strLen);

		return $this;
	}

	/**
	 * @return string
	 */
	public function getStrLen() {
		return $this->strLen;
	}

	/**
	 * Split the message in to lines based on our CowSay::$maxLen
	 * @param $message
	 * @return array
	 */
	protected function splitMessage($message) {
		return explode(PHP_EOL, wordwrap($message, $this->maxLen, PHP_EOL));
	}

	/**
	 * Calculate our message line length for multi-line messages
	 * @param $lines
	 * @return $this
	 */
	protected function calcLineLength($lines) {
		$strLen = 0;

		foreach ($lines as $line) {
			$strLen = max($strLen, min($this->getMaxLen(), strlen(utf8_decode($line))));
		}

		return $this->setStrLen($strLen);
	}

	/**
	 * Make a border string based on the computer CowSay::$strLen
	 * @return string
	 */
	protected function mkBorder() {
		return '  ' . str_repeat('-', $this->getStrLen());
	}

	/**
	 * Format the message for output
	 * @return string
	 */
	protected function formatMessage() {
		$output = [];

		$lines = $this->splitMessage($this->getMessage());
		$this->calcLineLength($lines);

		if (count($lines) < 2) {
			$output[] = '< ' . $lines[0] . ' >';
		} else {
			end($lines);
			$lastLine = key($lines);
			reset($lines);

			foreach ($lines as $key => $value) {
				# can't trust str_pad with utf8 string lengths
				$padding = $this->getStrLen() - mb_strlen(utf8_decode($value));
				$value .= str_repeat(' ', $padding);

				switch ($key) {
					case 0;
						$output[] = '/ ' . $value . ' \\';
						break;
					case $lastLine:
						$output[] = '\\ ' . $value . ' /';
						break;
					default:
						$output[] = '| ' . $value . ' |';
				}
			}
		}

		$border = $this->mkBorder();

		return $border . PHP_EOL . implode(PHP_EOL, $output) . PHP_EOL . $border;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->say();
	}

	/**
	 * Return a list of traits supported by the carcass
	 * @return array
	 */
	public function getSupportedTraits() {
		$traits = class_uses(get_called_class());

		$parents = class_parents($this);
		foreach ($parents as $parentClass) {
			$traits = array_merge($traits, class_uses($parentClass));
		}

		$traits = array_map(function ($trait) {
			return str_replace('CowSay\\Traits\\', '', $trait);
		}, $traits);

		return $traits;
	}
}