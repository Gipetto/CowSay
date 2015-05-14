# PHP CowSay

An extensible PHP port of the [Linux Cowsay](http://en.wikipedia.org/wiki/Cowsay) utility. This library is not designed
for command line use. You should install the original Cowsay for that.

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

## Traits

Cows support a few traits. You can specify the eyes, tongue, udder and, yes, you can specify poop.

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
                U ||----W |
                  ||     || @@@
```