<?php

declare(strict_types=1);

namespace VirCom\EWUS;

use VirCom\EWUS\Client\EWUSClient;
use VirCom\EWUS\Enum\EWUSServerUrlEnum;

class EWUSClientFactory
{
    public function createService(
        EWUSServerUrlEnum $url
    ): EWUSClient {


        return new EWUSClient();
    }
}