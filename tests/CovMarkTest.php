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
        $this->assertTrue(CovMark::check('my_awesome_mark'));
    }

    public function testWrongHit(): void
    {
        CovMark::destroy();
        $this->hit();
        $this->assertFalse(CovMark::check('my_not_awesome_mark'));
    }

    public function testNoHit(): void
    {
        CovMark::destroy();
        $this->assertFalse(CovMark::check('my_awesome_mark'));
    }
}
