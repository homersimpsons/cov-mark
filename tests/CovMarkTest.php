<?php

declare(strict_types=1);

namespace CovMark;

use PHPUnit\Framework\TestCase;

class CovMarkTest extends TestCase
{
    private const HIT = 'my_awesome_mark';

    private function hit(): void
    {
        CovMark::hit(self::HIT);
    }

    public function testHit(): void
    {
        CovMark::destroy();
        $this->hit();
        $this->assertTrue(CovMark::check(self::HIT));
    }

    public function testWrongHit(): void
    {
        CovMark::destroy();
        $this->hit();
        $this->assertFalse(CovMark::check('not_' . self::HIT));
    }

    public function testNoHit(): void
    {
        CovMark::destroy();
        $this->assertFalse(CovMark::check(self::HIT));
    }

    public function testDestroy(): void
    {
        CovMark::destroy();
        $this->hit();
        $this->assertTrue(CovMark::check(self::HIT));
        CovMark::destroy();
        $this->assertFalse(CovMark::check(self::HIT));
    }
}
