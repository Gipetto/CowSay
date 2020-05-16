# Adding new Carcases

CowSay is easily extended to add new carcases for your custom needs.

Create your Cow file. In this example we'll create a Bear

```php
<?php

class Bear extends \CowSay\Core\Calf {
	
	protected $carcass = <<<BEAR
     \
      \ _     _
       (o\---/o)
        ( . . )
       _( (T) )_
      / /     \ \
     / /       \ \
     \_)       (_/
       \   _   /
       _)  |  (_
      (___,'.___)
BEAR;
	
	protected function buildCarcass(): string {
		return $this->carcass;
	}
	
}
```

You can now use Mr. Bear the same way you'd use a built in cow:

```php
$bear = new Bear('Hey, BooBoo!');
echo $bear;
```

To get:

```
  ------------
< Hey, BooBoo! >
  ------------
     \
      \ _     _
       (o\---/o)
        ( . . )
       _( (T) )_
      / /     \ \
     / /       \ \
     \_)       (_/
       \   _   /
       _)  |  (_
      (___,'.___)
```

## Using Traits

But lets say you want your bear to have configurable eyes. Lets add in the Eyes trait to give him support for that. 

CowSay traits are actually [PHP Traits](http://php.net/traits) so they're easy to add. Near the top of your class add `use \CowSay\Traits\Eyes;`. The methods for getting and setting the Eye strings are defined within the trait, so normally there'd be no need to define them, but since we've got a space between the bear's eyes we need to override the `setEyes` method for compatability. We'll also need to set the default eyes via the constructor.

Next we'll need to make the eyes in the carcass replaceable. You can use any of the myriad of text replacement methods provided by PHP but in this example we'll use [`sprintf`](http://php.net/sprintf) because it allows us easy to see replacement placeholders. First lets replace the dots that Teddy has for eyes and replace them with `%s` (`sprintf`'s string argument placeholder). Then we'll modify the `buildCarcass` function to implement `sprintf` for the text replacement. 

```php
<?php

require 'CowSay.php';

class Bear extends \CowSay\Core\Calf {

	use \CowSay\Traits\Eyes;

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

	public function __construct($message = '', $maxLen = self::DEFAULT_MAX_LEN) {
		parent::__construct($message, $maxLen);
		$this->setEyes('. .');
	}

	public function setEyes($eyes) {
		if (strlen($eyes) == 1) {
			$eyes .= ' ' . $eyes;
		}

		if (strlen($eyes) > 3) {
			$eyes = substr($eyes, 0, 3);
		}

		$this->eyes = $eyes;
		return $this;
	}

	protected function buildCarcass(): string {
		return sprintf($this->carcass, $this->getEyes());
	}
}
```

Now, you can override the eyes:

```php
$bear = new Bear('Hey, BooBoo!');
$bear->setEyes('o -');
echo $bear;
```

To get

```
  ------------
< Hey, BooBoo! >
  ------------
     \
      \ _     _
       (o\---/o)
        ( o - )
       _( (T) )_
      / /     \ \
     / /       \ \
     \_)       (_/
       \   _   /
       _)  |  (_
      (___,'.___)
```

## Enjoy!

The [fully annotated Bear](../src/Carcases/Bear.php) is included with the default carcasses.
