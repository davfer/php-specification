PHP Specification
=================

Introduction
------------
This is a simple and agnostic specification pattern implementation.

Installation
------------
```bash
composer require davfer/php-specification
```

Usage
-----
As a starting point, you can use the `AttrSpecification` class 
to create a specification based on an object attribute. 

Then you can combine specifications using `AndSpecification`, `OrSpecification` and `NotSpecification` classes.

```php

$spec = new AndSpecification(
    new OrSpecification(
        new AttrSpecification('name', 'john'),
        new AttrSpecification('name', 'jane'),
    ),
    new NotSpecification(
        new AttrSpecification('id', 1)
    )
);

$spec->isSatisfiedBy(new User(1, 'john')); // false
$spec->isSatisfiedBy(new User(2, 'jane')); // true
$spec->isSatisfiedBy(new User(3, 'mike')); // false
```

Always encapsulate the logic in a self explanatory class, 
like in the example above could be: `JohnOrJaneButNotFirstUserSpecification.php`.

Plugins
-------

- [php-specification-doctrine](https://github.com/davfer/sphp-specification-doctrine): Doctrine ORM Specification
  implementation.
