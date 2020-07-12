<?php

declare(strict_types=1);

namespace CovMark;

final class CovMark
{
    /** @var array<string, true> */
    private static array $hits = [];

    private function __construct()
    {
    }

    public static function destroy(): void
    {
        self::$hits = [];
    }

    public static function hit(string $mark): void
    {
        self::$hits[$mark] = true;
    }

    public static function check(string $mark): bool
    {
        return isset(self::$hits[$mark]);
    }
}
