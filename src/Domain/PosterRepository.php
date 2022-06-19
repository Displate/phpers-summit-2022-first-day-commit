<?php

declare(strict_types=1);

namespace Displate\Phpers\Domain;

interface PosterRepository
{
    public function findPoster(string $posterId): ?Poster;
}
