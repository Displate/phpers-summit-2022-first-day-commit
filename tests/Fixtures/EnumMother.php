<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures;

use function gettype;
use RuntimeException;

class EnumMother
{
    /**
     * @template E
     * @param  class-string<E>  $enum
     * @throws RuntimeException
     * @return E
     */
    public static function any(string $enum): mixed
    {
        if (!enum_exists($enum)) {
            throw new RuntimeException(
                sprintf('Expected Enum, got: `%s`', gettype($enum)),
            );
        }

        return $enum::cases()[array_rand($enum::cases())];
    }
}
