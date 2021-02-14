<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Factory\Client;

use VirCom\EWUS\V5\Client\EWUSClient;
use GuzzleHttp\Client as GuzzleClient;

class EWUSClientFactory
{
    public function createClient()
    {
        return new EWUSClient(
            new GuzzleClient()
        );
    }
}