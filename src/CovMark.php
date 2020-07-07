<?php

declare(strict_types=1);

namespace CovMark;

final class CovMark
{
    private static ?CovMark $_instance = null;

    /** @var array<string, bool> */
    private array $hits = []; // phpcs:ignore SlevomatCodingStandard.Classes.UnusedPrivateElements.UnusedProperty

    private function __construct()
    {
    }

    private static function getInstance(): CovMark
    {
        if (self::$_instance === null) {
            self::$_instance = new CovMark();
        }

        return self::$_instance;
    }

    public static function destroy(): void
    {
        self::$_instance = null;
    }

    public static function hit(string $mark): void
    {
        $instance              = self::getInstance();
        $instance->hits[$mark] = true;
    }

    public static function check(string $mark): void
    {
        $instance = self::getInstance();
        if (! isset($instance->hits[$mark])) {
            throw new MarkNotHit($mark);
        }
    }
}
