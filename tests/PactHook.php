<?php

declare(strict_types=1);

namespace Displate\Phpers\Test;

use function in_array;
use PhpPact\Http\GuzzleClient;
use PhpPact\Standalone\MockService\MockServer;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PhpPact\Standalone\MockService\Service\MockServerHttpService;
use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\AfterTestHook;
use PHPUnit\Runner\BeforeTestHook;

class PactHook implements BeforeTestHook, AfterTestHook, AfterLastTestHook
{
    private MockServerHttpService $httpService;
    private MockServer $server;
    private bool $isServerUp = false;

    public function executeAfterLastTest(): void
    {
        if ($this->isServerUp) {
            $this->server->stop();
            $this->isServerUp = false;
        }
    }

    public function executeAfterTest(string $test, float $time): void
    {
        if ($this->isServerUp && $this->isServerRequired($test)) {
            $this->httpService->deleteAllInteractions();
        }
    }

    public function executeBeforeTest(string $test): void
    {
        if (!$this->isServerUp && $this->isServerRequired($test)) {
            $this->startServer();
        }
    }

    public static function serverConfig(): MockServerEnvConfig
    {
        return new MockServerEnvConfig();
    }

    private function isServerRequired(string $test): bool
    {
        return in_array(
            PactTrait::class,
            class_uses($this->extractTestClass($test)),
            true,
        );
    }

    private function extractTestClass(string $test): string
    {
        return explode('::', $test)[0];
    }

    private function startServer(): void
    {
        $this->server = new MockServer(self::serverConfig());
        $this->server->start();

        $this->isServerUp = true;

        $this->httpService = new MockServerHttpService(new GuzzleClient(), self::serverConfig());
    }
}
