<?php

declare(strict_types=1);

namespace Displate\Phpers\Domain;

class Poster
{
    public function __construct(
        private string $id,
        private PosterSize $size,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function size(): PosterSize
    {
        return $this->size;
    }
}
