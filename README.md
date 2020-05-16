# PHP CowSay

[![Release Version](https://img.shields.io/github/release/Gipetto/CowSay.svg)](/Gipetto/CowSay/releases)
[![Packagist Version](https://img.shields.io/packagist/v/Gipetto/CowSay.svg)](https://packagist.org/packages/gipetto/cowsay)
[![Build Status](https://travis-ci.org/Gipetto/CowSay.svg?branch=master)](https://travis-ci.org/Gipetto/CowSay)
![Moo, Cow](https://img.shields.io/badge/Moo-Cow-orange.svg)

An extensible PHP port of the [Linux Cowsay](http://en.wikipedia.org/wiki/Cowsay) utility. This library is not designed
for command line use. You should install the original Cowsay for that.

## Requirements

- PHP 7.2+

## Install 

```
$ composer require Gipetto/CowSay
```

## Quickstart

```php
$bessie = new Cow('Hello, Farm!');
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

## Adding new Carcases

CowSay is easily extended to add new carcases for your custom needs. See the [Carcasses](docs/Carcasses.md) tutorial for more
information.

## License

CowSay is licenced under [The MIT License (MIT)](LICENSE.txt).
