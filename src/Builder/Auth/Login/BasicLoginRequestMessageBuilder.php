<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Builder\Auth\Login;

use VirCom\EWUS\V5\Exception\Builder\InvalidArgumentException;
use VirCom\EWUS\V5\Request\Auth\Login\AbstractLoginRequest;
use VirCom\EWUS\V5\Request\Auth\Login\BasicLoginRequest;

class BasicLoginRequestMessageBuilder extends AbstractLoginRequestMessageBuilder
{
    /**
     * @param BasicLoginRequest $request
     * @return void
     */
    protected function addAdditionalCredentials(
        AbstractLoginRequest $request
    ): void {
        $this->validate($request);
    }

    private function validate(
        AbstractLoginRequest $request
    ): void {
        if(!$request instanceof BasicLoginRequest) {
            throw new InvalidArgumentException(
                sprintf(
                    "Builder requires instance of %s class. %s given!",
                    BasicLoginRequest::class,
                    get_class($request)
                )
            );
        }
    }
}