<?php

declare(strict_types=1);

namespace Displate\Phpers\Presentation\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Home
{
    public function __invoke(): Response
    {
        return new JsonResponse([
            'topic' => 'First Day Commit',
        ]);
    }
}
