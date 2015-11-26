<?php

require_once 'vendor/autoload.php';

$carcases = glob('src/Carcases/*.php');

foreach ($carcases as $carcass) {
	$class = '\\CowSay\\' . basename($carcass, '.php');

	/** @var $obj Cowsay\Core\Calf */
	$obj = new $class();

	$message = 'How now brown ' . $class . '.' . PHP_EOL;

	$traits = $obj->getSupportedTraits();

	if (!count($traits)) {
		$message .= 'I don\'t support any Traits.';
	} else {
		$message .= 'I support the following Traits:';
		foreach ($traits as $trait) {
			$message .= PHP_EOL . ' • ' . $trait;
		}
	}

	$obj->setMessage($message);
	echo $obj . PHP_EOL . PHP_EOL;
	unset($obj);
}