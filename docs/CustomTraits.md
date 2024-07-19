# Adding new Traits

## Creating a Trait Class

Creating a new Trait is pretty straight forward. Trait method names aren't enforced, and through the magic of PHP Attributes are automatically inferred for output.

```
<?php

use CowSay\Core\TraitGetter

trait MethaneCloud {
  protected string $cloud;

  public function setEars(string $cloud): self {
    // optionally process string before setting its value
    $this->cloud = $cloud;
    return $this;
  }

  #[TraitGetter('cloud')]
  public function getCloud(): string {
    return $this->cloud;
  }
}
```

## The Setter Method

The setter method should take your input, modify as necessary, and save it to an internal class member.

Trait setters should `return $this` to allow for setter method chaining.

## The Getter Method & Attribute

The getter method should simply return the value of the internal class member.

The getter method is inferred by the base Carcass via the Attribute defined on the method. The `#[TraitGetter('cloud')]` identifies this method as the getter for the Carcass template variable `{cloud}`, and will make the replacement automatically.

Read more on [PHP Attributes](https://www.php.net/manual/en/language.attributes.overview.php).