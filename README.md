# Bag

Inspired by [ParameterBag](https://github.com/symfony/http-foundation/blob/master/ParameterBag.php) i decided to create a new repository that contains a similiar class with a few adjustments.


## Requirements

PHP 7.0.0 or later.

## Composer

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require railken/bag
```


## Getting Started

Simple usage looks like:

```php

use Railken\Bag;

# Initialization
$bag = new Bag();
$bag = new Bag(['foo' => '1']);

# Setting
$bag->set('foo', 1)->set('fee, 2);

# Getting
$bag->foo; #1
$bag->get('bar', 3); #3
 
```


## License

Open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
