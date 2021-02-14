<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EWUSClient implements ClientInterface
{
    public function __construct(
        private ClientInterface $client
    ) {

    }

    public function sendRequest(
        RequestInterface $request
    ): ResponseInterface {
        return $this->client->sendRequest($request);
    }
}