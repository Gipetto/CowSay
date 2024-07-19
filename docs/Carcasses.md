# Adding new Carcases

## Table of Contents

* [Basic Usage](#basic-usage)
* [Using Traits](#using-traits)
* [Further Customization](#further-customization)

## Basic Usage

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

In the Carcass template, replace the eyes with a placeholder that matches the trait being used, in this case we'll replace the `. .` with `{eyes}`. The `{eyes}` will automatically be replaced.

**NOTE:** It is recommended that if you want to process the input to any trait that you override the trait setter method, not the getter, as the getter methods need an Attribute annotation to properly match the Trait with its placeholder in the Carcass template.

### Available Traits

| Trait | Template Param | Setter |
| ----- | -------------- | ------ |
| `CowSay\Traits\Eyes` | `{eyes}` | `setEyes` |
| `CowSay\Traits\Poop` | `{poop}` | `setPoop` |
| `CowSay\Traits\Tongue` | `{tongue}` | `setTongue` |
| `CowSay\Traits\Udder` | `{udder}` | `setUdder` |

### Example Code

```php
<?php

require 'CowSay.php';

class Bear extends \CowSay\Core\Calf {

	use \CowSay\Traits\Eyes;

	protected $carcass = <<<BEAR

     \
      \ _     _
       (o\---/o)
        ( {eyes} )
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

## Further Customization

As of version `2.0` of this package the `buildCarcass` method will automatically determine the traits used in a Carcass and process their string replacements in the Carcass template. However, if you want to do more complex replacements you can still override the `buildCarcass` method to additionally process the output, or completely override the Carcass processing.

## Enjoy!

The [fully annotated Bear](../src/Carcases/Bear.php) is included with the default carcasses.