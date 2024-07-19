# PHP CowSay

[![Release Version](https://img.shields.io/github/release/Gipetto/CowSay.svg)](https://github.com/Gipetto/CowSay/releases)
[![Packagist Version](https://img.shields.io/packagist/v/Gipetto/CowSay.svg)](https://packagist.org/packages/gipetto/cowsay)
[![Build Status](https://github.com/Gipetto/CowSay/actions/workflows/main.yml/badge.svg)](https://github.com/Gipetto/CowSay/actions/workflows/main.yml)
![Moo, Cow](https://img.shields.io/badge/Moo-Cow-orange.svg)

An extensible PHP port of the [Linux Cowsay](http://en.wikipedia.org/wiki/Cowsay) utility.

## Requirements

- Minimum: PHP 8.0.2+
- Recommended: PHP 8.2+

Official PHP supported versions: https://www.php.net/supported-versions.php

## Install 

```
$ composer require Gipetto/CowSay
```

## Quickstart

```php
use CowSay\Cow;

$bessie = new Cow('Hello, Farm!');

// store the output in a variable
$output = $bessie->say();
echo $output;

// or just echo the object for direct output
echo $bessie;
```

Displays:

```
  ------------
< Hello, Farm! >
  ------------
          \   ^__^
           \  (oo)\_______
              (__)\       )\/\
                  ||----w |
                  ||     ||
```

Run `php demo.php` to see all the included cows and their traits.

## Traits

Cows support a few traits. You can specify the Eyes, Tongue, Udder and, yes, you can specify Poop.

```php
$bessie = new Cow('Hello, Farm!');
$bessie->setEyes('oO')
    ->setTongue('U')
    ->setPoop('@@@')
    ->setUdder('W');
echo $bessie;
```

Displays:

```
  ------------
< Hello, Farm! >
  ------------
          \   ^__^
           \  (oO)\_______
              (__)\       )\/\
               U  ||----W |
                  ||     || @@@
```

## Extending CowSay

### Adding New Carcases

CowSay is easily extended to add new carcases for your custom needs. See the [Carcasses](docs/Carcasses.md) tutorial for more
information.

### Adding New Traits

It is easy to add new Traits to CowSay. See the [Custom Traits](docs/CustomTraits.md) documentation for more information.

## Known Issues

- Line length calculations are not fully understood for strings with longer byte length characters. ie: Chinese.

## License

CowSay is licensed under [The MIT License (MIT)](LICENSE.txt).
