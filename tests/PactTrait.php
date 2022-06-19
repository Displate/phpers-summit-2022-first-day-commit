<?php

declare(strict_types=1);

namespace Displate\Phpers\Test;

use PhpPact\Consumer\InteractionBuilder;

trait PactTrait
{
    public function interactionBuilder(): InteractionBuilder
    {
        return new InteractionBuilder(PactHook::serverConfig());
    }
}
