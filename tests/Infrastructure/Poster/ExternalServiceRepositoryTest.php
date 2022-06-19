<?php

declare(strict_types=1);

namespace Displate\Phpers\Test\Infrastructure\Poster;

use Displate\Phpers\Domain\PosterSize;
use Displate\Phpers\Infrastructure\Poster\ExternalServiceRepository;
use Displate\Phpers\Test\PactTrait;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ExternalServiceRepositoryTest extends KernelTestCase
{
    use PactTrait;

    private ExternalServiceRepository $repository;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->repository = self::getContainer()->get(ExternalServiceRepository::class);
    }

    public function testFetchPosterSucceeded(): void
    {
        // given
        $request = (new ConsumerRequest())
            ->setMethod('GET')
            ->setPath('/api/posters/awesomePoster')
        ;

        $response = (new ProviderResponse())
            ->setStatus(200)
            ->setBody([
                'id' => 'awesomePoster',
                'size' => 'l',
            ])
        ;

        $this->interactionBuilder()
            ->uponReceiving('Fetch awesome poster')
            ->with($request)
            ->willRespondWith($response)
        ;

        // when
        $result = $this->repository->findPoster('awesomePoster');

        // then
        self::assertSame('awesomePoster', $result->id());
        self::assertSame(PosterSize::L, $result->size());
    }
}
