<?php

declare(strict_types=1);

namespace Displate\Phpers\Infrastructure\Poster;

use Displate\Phpers\Domain\Poster;

class PosterFactory
{
    public function fromModel(Model $model): Poster
    {
        return new Poster();
    }
}
