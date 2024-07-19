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
// Demo multibyte string

echo PHP_EOL . PHP_EOL . "### Note:" . PHP_EOL;
echo "Multi-byte strings may have line length calculation issues" . PHP_EOL;
echo "when combined with single byte characters, but shouldn't break..." . PHP_EOL;
$obj = new CowSay\Cow("", 10);
$obj->setMessage("UTF8 will truncate to 10 chars. Other byte lengths won't. 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？ 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？ 现在怎么棕色的牛。这不是多字节字符串的精彩演示吗？");
echo $obj . PHP_EOL . PHP_EOL;
