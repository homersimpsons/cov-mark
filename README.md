# CovMark

Ensure that your tests are using the right conditions

## Usage

```php
use CovMark\CovMark;

function save_divide(int $dividend, int $divisor): int
{
    if ($divisor === 0) {
        CovMark::hit('save_divide_zero');
        return 0;
    }
    return (int) ($dividend / $divisor);
}

function test_safe_divide(): void
{
    CovMark::destroy(); // Ensure there are no previous instance
    save_divide(92, 0);
    CovMark::check('save_divide_zero'); // This throws `CovMark\MarkNotHit` if mark is not hit 
}
```

## Inspiration

https://github.com/matklad/cov-mark
