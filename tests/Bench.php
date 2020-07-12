<?php

declare(strict_types=1);

namespace CovMark;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @Revs(5)
 * @Iterations(5)
 */
class Bench
{
    /**
     * This benchmark measure the impact of cov-mark in "production code"
     * Here we do consider that a "production code" will hit twice 2 different mark.
     */
    public function benchProductionImpact(): void
    {
        CovMark::hit('bench0');
        CovMark::hit('bench1');
        CovMark::hit('bench0');
        CovMark::hit('bench1');
    }

    /**
     * This benchmark measure the impact of cov-mark in "test code"
     * Here we do consider that a "test code" will have do `destroy` and `check`.
     */
    public function benchTestImpact(): void
    {
        CovMark::destroy();
        CovMark::hit('bench0');
        CovMark::check('bench0');
        CovMark::destroy();
        CovMark::hit('bench0');
        CovMark::check('bench1');
    }
}
