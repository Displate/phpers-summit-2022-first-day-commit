<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Fixtures;

use function array_key_exists;
use function count;
use Faker\Factory;
use Faker\Generator;

trait DynamicBuilder
{
    protected array $args;
    private static Generator|null $generator = null;

    private function __construct()
    {
        $this->args = static::defaultArgs();
    }

    public function __call(string $name, array $arguments)
    {
        $key = lcfirst(ltrim($name, 'with'));
        $fqn = sprintf(
            '%s::%s()',
            static::class,
            $name,
        );

        if (!str_starts_with($name, 'with') || !array_key_exists($key, $this->args)) {
            throw new Error(sprintf(
                'Call to undefined method %s',
                $fqn,
            ));
        }

        if (count($arguments) !== 1) {
            throw new InvalidArgumentException(sprintf(
                'Method %s accepts only 1 argument.',
                $fqn,
            ));
        }

        $this->args[$key] = reset($arguments);

        return $this;
    }

    abstract public function build();

    public static function create(): static
    {
        return new static();
    }

    abstract public static function defaultArgs(): array;

    protected static function faker(): Generator
    {
        if (null === static::$generator) {
            static::$generator = Factory::create();
        }

        return static::$generator;
    }
}
