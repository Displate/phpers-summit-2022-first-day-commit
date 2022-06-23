<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures;

use Displate\Phpers\Domain\Poster;
use Displate\Phpers\Domain\PosterSize;
use Faker\Factory;

class PosterBuilder
{
    private array $args;

    private function __construct()
    {
        $this->args = self::defaultArgs();
    }

    public static function create(): self
    {
        return new self();
    }

    public function withId(string $id): self
    {
        $this->args['id'] = $id;

        return $this;
    }

    public function withSize(PosterSize $size): self
    {
        $this->args['size'] = $size;

        return $this;
    }

    public function build(): Poster
    {
        return new Poster(...$this->args);
    }

    private static function defaultArgs(): array
    {
        $faker = Factory::create();

        return [
            'id' => $faker->uuid(),
            'size' => EnumMother::any(PosterSize::class),
        ];
    }
}
