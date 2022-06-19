<?php

declare(strict_types=1);

namespace Displate\Phpers\Infrastructure\Poster;

use Displate\Phpers\Domain\Poster;
use Displate\Phpers\Domain\PosterRepository;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ExternalServiceRepository implements PosterRepository
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly PosterFactory $posterFactory,
    ) {
    }

    public function findPoster(string $posterId): ?Poster
    {
        $response = $this->httpClient->request(
            Request::METHOD_GET,
            sprintf(
                '/api/posters/%s',
                $posterId,
            ),
        );

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new RuntimeException('Failed to fetch a poster.');
        }

        return $this->posterFactory->fromModel($this->responseToModel($response));
    }

    private function responseToModel(ResponseInterface $response): Model
    {
        return new Model();
    }
}
