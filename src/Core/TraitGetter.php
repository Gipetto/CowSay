<?php
declare(strict_types=1);

namespace CowSay\Core;
use Attribute;

#[Attribute]
class TraitGetter {
	public function __construct(public string $trait) {}

	public function getKeyName() {
		return sprintf('{%s}',  $this->trait);
	}
}