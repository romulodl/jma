# Jurik Moving Average

Calculate the JMA of giving values.

![Ema](https://github.com/romulodl/ema/workflows/Jma/badge.svg)

## Instalation

```
composer require romulodl/jma
```

or add `romulodl/jma` to your `composer.json`. Please check the latest version in releases.

## Usage

```php
$ema = new Romulodl\Jma();
$ema->calculate(
  array $values,
  int $period = 7,
  int $phase = 50,
  float $power = 2
);
```

For example:
```php
$ema = new Romulodl\Jma();
$ema->calculate([10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);
```

You would normally give a larger period to add smoothness to the result.