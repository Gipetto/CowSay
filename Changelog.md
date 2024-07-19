# Changelog

See https://github.com/Gipetto/CowSay/releases for release dates.

## 2.0
- Deprecate support for PHP 7.4
- Use PHP Attributes to specify Trait string getters so that we can automagically build the carcass output. Extended carcasses no longer need to define their own `buildCarcass` function. This remains backwards compatible with custom made Carcasses that still use an old style `buildCarcass` method.
- Update documentation

## 1.1.0
- No new features. This is a mostly useless update of language compatibility.
- Deprecate support for PHP < 7.2
- Introduce PHP 7.2 level type safety features
    - Won't have the best support until 7.4 is the baseline

## 1.0.4
- Fixed up PSR-4 class loading

## 1.0.3
- General fixes

## 1.0.2
- General fixes

## 1.0.1
- Better docs
- Full semantic version number
- Composer.json file for submission to Packagist.

## 1.0
- Initial release
