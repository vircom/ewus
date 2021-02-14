<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Builder\Auth\Login;

use VirCom\EWUS\V5\Request\Auth\Login\AbstractLoginRequest;

interface LoginRequestMessageBuilder
{
    public function createMessage(AbstractLoginRequest $request): string;
}