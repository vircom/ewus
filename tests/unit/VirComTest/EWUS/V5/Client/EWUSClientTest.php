<?php

declare(strict_types=1);

namespace VirComTest\EWUS\V5\Client;

use VirCom\EWUS\V5\Client\EWUSClient;
use Codeception\Test\Unit;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;

class EWUSClientTest extends Unit
{
    private EWUSClient $eWUSClient;
    private ClientInterface $client;
    private RequestInterface $request;
    private ResponseInterface $response;
    
    protected function _before()
    {
        $this->client = $this->makeEmpty(ClientInterface::class);
        $this->request = $this->makeEmpty(RequestInterface::class);
        $this->response = $this->makeEmpty(ResponseInterface::class);

        $this->eWUSClient = new EWUSClient(
            $this->client
        );
    }

    public function testSendRequestMethodReturnsExpectedResponse()
    {
        $this->client = $this->makeEmpty(
            ClientInterface::class,
            [
                'sendRequest' => function() {
                    return $this->response;
                },
            ]
        );

        $this->assertEquals(
            $this->response,
            $this->eWUSClient->sendRequest(
                $this->request
            )
        );
    }
}