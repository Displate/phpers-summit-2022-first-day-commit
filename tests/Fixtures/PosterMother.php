<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures;

use Displate\Phpers\Domain\Poster;
use Displate\Phpers\Domain\PosterSize;

class PosterMother
{
    public static function any(): Poster
    {
        return DynamicPosterBuilder::create()->build();
    }

    public static function medium(): Poster
    {
        return DynamicPosterBuilder::create()
            ->withSize(PosterSize::M)
            ->build()
        ;
    }

    public static function large(): Poster
    {
        return DynamicPosterBuilder::create()
            ->withSize(PosterSize::L)
            ->build()
        ;
    }

    public static function extraLarge(): Poster
    {
        return DynamicPosterBuilder::create()
            ->withSize(PosterSize::XL)
            ->build()
        ;
    }
}
