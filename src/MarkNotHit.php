<?php

declare(strict_types=1);

namespace CovMark;

use RuntimeException;
use Throwable;

class MarkNotHit extends RuntimeException
{
    public function __construct(string $mark, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('`' . $mark . '` not hit.', $code, $previous);
    }
}
