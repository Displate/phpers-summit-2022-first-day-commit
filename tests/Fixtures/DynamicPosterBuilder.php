<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures;

use Displate\Phpers\Domain\Poster;
use Displate\Phpers\Domain\PosterSize;

/**
 * Alternative for PosterBuilder.
 *
 * @method self withId(string $id)
 * @method self withSize(PosterSize $size)
 */
class DynamicPosterBuilder
{
    use DynamicBuilder;

    public function build(): Poster
    {
        return new Poster(...$this->args);
    }

    public static function defaultArgs(): array
    {
        return [
            'id' => self::faker()->uuid(),
            'size' => EnumMother::any(PosterSize::class),
        ];
    }
}
