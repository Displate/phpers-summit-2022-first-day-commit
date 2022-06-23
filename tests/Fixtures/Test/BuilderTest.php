<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures\Test;

use Displate\Phpers\Domain\PosterSize;
use Displate\Phpers\Test\Fixtures\PosterBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Displate\Phpers\Test\Fixtures\PosterBuilder
 */
class BuilderTest extends TestCase
{
    public function testBuildWithGivenData(): void
    {
        // given
        $id = 'SOMEID';
        $size = PosterSize::L;

        // when
        $result = PosterBuilder::create()
            ->withId($id)
            ->withSize($size)
            ->build()
        ;

        // then
        self::assertSame('SOMEID', $result->id());
        self::assertSame(PosterSize::L, $result->size());
    }
}
