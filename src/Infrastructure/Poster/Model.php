<?php

declare(strict_types=1);

namespace Displate\Phpers\Infrastructure\Poster;

class Model
{
    public function __construct(
        public readonly string $id,
        public readonly string $size,
    ) {
    }
}
