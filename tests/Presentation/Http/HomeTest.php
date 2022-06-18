<?php
declare(strict_types=1);

namespace Presentation\Http;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class HomeTest extends WebTestCase
{
    public function testHomeEndpointIsReachable(): void
    {
        // given
        $client = self::createClient();

        // when
        $client->request(
            Request::METHOD_GET,
            '/',
        );

        // then
        $response = $client->getResponse();

        self::assertEquals(200, $response->getStatusCode());
        self::assertSame('{"topic":"First Day Commit"}', $response->getContent());
    }
}
