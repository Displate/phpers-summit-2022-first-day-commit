<?php

declare(strict_types=1);

namespace Displate\Phpers\Infrastructure\Poster;

use Displate\Phpers\Domain\Poster;
use Displate\Phpers\Domain\PosterSize;

class PosterFactory
{
    public function fromModel(Model $model): Poster
    {
        return new Poster(
            $model->id,
            PosterSize::from($model->size),
        );
    }
}
