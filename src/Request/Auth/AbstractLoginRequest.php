<?php

declare(strict_types=1);

namespace VirCom\EWUS\Request\Auth;

use VirCom\EWUS\Enum\NHFBranchIdentifierEnum;

abstract class AbstractLoginRequest
{
    public function __construct(
        protected NHFBranchIdentifierEnum $domain,
        protected string $login,
        protected string $password
    ) { }

    public function getDomain(): NHFBranchIdentifierEnum
    {
        return $this->domain;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}