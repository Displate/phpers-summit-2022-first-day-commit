<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures\Test;

use Displate\Phpers\Domain\PosterSize;
use Displate\Phpers\Test\Fixtures\DynamicPosterBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Displate\Phpers\Test\Fixtures\DynamicPosterBuilder
 */
class DynamicBuilderTest extends TestCase
{
    public function testBuildWithGivenData(): void
    {
        // given
        $id = 'SOMEID';
        $size = PosterSize::L;

        // when
        $result = DynamicPosterBuilder::create()
            ->withId($id)
            ->withSize($size)
            ->build()
        ;

        // then
        self::assertSame('SOMEID', $result->id());
        self::assertSame(PosterSize::L, $result->size());
    }
}
