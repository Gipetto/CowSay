<?php
declare(strict_types=1);

namespace CowSay\Core;

use Stringable;
use ReflectionObject;
use Symfony\Component\String\UnicodeString;

/**
 * Class Calf
 * @package CowSay
 *
 * @method $this getEyes
 * @method $this getTongue
 * @method $this getUdder
 */
abstract class Calf implements Stringable {

	const DEFAULT_MAX_LEN = 50;

	/**
	 * @var string carcass!
	 */
	protected string $carcass;

	/**
	 * @var UnicodeString message to display
	 */
	protected UnicodeString $message;

	/**
	 * @var int max length of output lines
	 */
	protected int $maxLen;

	/**
	 * @var int longest length of output lines found
	 */
	protected int $strLen = 0;

	/**
	 * @param $message
	 * @param int $maxLen
	 */
	public function __construct($message = '', int $maxLen = self::DEFAULT_MAX_LEN) {
		$this->setMessage($message);
		$this->setMaxLen($maxLen);
	}

	/**
	 * Output the Complete message and cow.
	 *
	 * @return string
	 */
	public function say(): string {
		return $this->formatMessage() . $this->buildCarcass();
	}

	/**
	 * @return string
	 */
	protected function buildCarcass(): string {
		$data = [];
		$reflection = new ReflectionObject($this);

		foreach ($reflection->getMethods() as $method) {
			$attributes = $method->getAttributes(TraitGetter::class);

			if (count($attributes)) {
				$methodName = $method->getName();
			
				foreach ($attributes as $attribute) {
					$instance = $attribute->newInstance();
					$data[$instance->getKeyName()] = $this->$methodName();
				}
			}
		}

		return strtr($this->carcass, $data);
	}

	/**
	 * @param $maxLen
	 * @returns $this;
	 */
	protected function setMaxLen(int $maxLen): self {
		$this->maxLen = $maxLen;

		return $this;
	}

	/**
	 * @return int
	 */
	protected function getMaxLen(): int {
		return $this->maxLen;
	}

	/**
	 * @param $message
	 * @returns $this
	 */
	public function setMessage(string $message): self {
		$this->message = new UnicodeString($message);
		return $this;
	}

	/**
	 * @return UnicodeString
	 */
	public function getMessage(): UnicodeString {
		return $this->message;
	}

	/**
	 * @param $strLen
	 * @return $this
	 */
	protected function setStrLen(int $strLen): self {
		$this->strLen = intVal($strLen);

		return $this;
	}

	/**
	 * @return int
	 */
	protected function getStrLen(): int {
		return $this->strLen;
	}

	/**
	 * Split the message in to lines based on our CowSay::$maxLen
	 * @param UnicodeString $message
	 * @return array
	 */
	protected function splitMessage(UnicodeString $message): array {
		return $message->wordwrap($this->maxLen, PHP_EOL)->split(PHP_EOL);
	}

	/**
	 * Calculate our message line length for multi-line messages
	 * @param $lines
	 * @return $this
	 */
	protected function calcLineLength(array $lines): self {
		$strLen = 0;

		foreach ($lines as $line) {
			$strLen = max(
				$strLen, 
				$line->width() > $this->getMaxLen() ? $line->width() : min($this->getMaxLen(), $line->width())
			);
		}

		return $this->setStrLen($strLen);
	}

	/**
	 * Make a border string based on the computed CowSay::$strLen
	 * @return string
	 */
	protected function mkBorder(): string {
		return '  ' . str_repeat('-', $this->getStrLen());
	}

	/**
	 * Format the message for output
	 * @return string
	 */
	protected function formatMessage(): string {
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
				$padding = $this->getStrLen() - $value->width();

				if ($padding >= 0) {
					$value .= str_repeat(' ', $padding);
				}

				$output[] = match ($key) {
					0 => '/ ' . $value . ' \\',
					$lastLine => '\\ ' . $value . ' /',
					default => '| ' . $value . ' |'
				};
			}
		}

		$border = $this->mkBorder();

		return $border . PHP_EOL . implode(PHP_EOL, $output) . PHP_EOL . $border;
	}

	/**
	 * @return string
	 */
	public function __toString():string {
		return $this->say();
	}

	/**
	 * Return a list of traits supported by the carcass
	 * @return array
	 */
	public function getSupportedTraits(): array {
		$traits = class_uses(get_called_class());

		$parents = class_parents($this);
		foreach ($parents as $parentClass) {
			$traits = array_merge($traits, class_uses($parentClass));
		}

		$traits = array_map(
			fn ($trait) => str_replace('CowSay\\Traits\\', '', $trait), 
			$traits
		);

		return $traits;
	}
}