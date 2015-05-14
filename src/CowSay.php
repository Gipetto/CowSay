<?php

namespace CowSay;

require 'Core/Calf.php';
require 'Traits/Eyes.php';
require 'Traits/Poop.php';
require 'Traits/Tongue.php';
require 'Traits/Udder.php';

spl_autoload_register(function($class) {
	$nameSpace = explode('\\', $class);

	if ($nameSpace[0] !== 'CowSay') {
		return false;
	}

	include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Carcases' . DIRECTORY_SEPARATOR . $nameSpace[1] . '.php';

	return true;
});