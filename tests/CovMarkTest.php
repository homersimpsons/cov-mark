<?php

declare(strict_types=1);

namespace CovMark;

use PHPUnit\Framework\TestCase;

class CovMarkTest extends TestCase
{
    private function hit(): void
    {
        CovMark::hit('my_awesome_mark');
    }

    public function testHit(): void
    {
        CovMark::destroy();
        $this->hit();
        CovMark::check('my_awesome_mark');
        $this->assertTrue(true);
    }

    public function testWrongHit(): void
    {
        CovMark::destroy();
        $this->expectException(MarkNotHit::class);
        $this->hit();
        CovMark::check('my_not_awesome_mark');
        $this->assertTrue(true);
    }

    public function testNoHit(): void
    {
        CovMark::destroy();
        $this->expectException(MarkNotHit::class);
        CovMark::check('my_awesome_mark');
        $this->assertTrue(true);
    }
}
