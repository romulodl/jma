# Jurik Moving Average

Calculate the JMA of giving values.

![Jma](https://github.com/romulodl/jma/workflows/Jma/badge.svg)

## Instalation

```
composer require romulodl/jma
```

or add `romulodl/jma` to your `composer.json`. Please check the latest version in releases.

## Usage

```php
$jma = new Romulodl\Jma();
$jma->calculate(
  array $values,
  int $period = 7,
  int $phase = 50,
  float $power = 2
);
```

For example:
```php
$jma = new Romulodl\Jma();
$jma->calculate([10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);
```

You would normally give a larger period to add smoothness to the result.
