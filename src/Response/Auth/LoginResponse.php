<?php

declare(strict_types=1);

namespace VirCom\EWUS\Response\Auth;

class LoginResponse
{
    public function __construct(
        private string $sessionId,
        private string $token
    ) { }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}