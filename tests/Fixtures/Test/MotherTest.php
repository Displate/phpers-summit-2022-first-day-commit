<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures\Test;

use Displate\Phpers\Domain\PosterSize;
use Displate\Phpers\Test\Fixtures\PosterMother;
use PHPUnit\Framework\TestCase;

class MotherTest extends TestCase
{
    public function testCreateMedium(): void
    {
        // when
        $result = PosterMother::medium();

        // then
        self::assertSame(PosterSize::M, $result->size());
    }

    public function testCreateLarge(): void
    {
        // when
        $result = PosterMother::large();

        // then
        self::assertSame(PosterSize::L, $result->size());
    }

    public function testCreateExtraLarge(): void
    {
        // when
        $result = PosterMother::extraLarge();

        // then
        self::assertSame(PosterSize::XL, $result->size());
    }
}
