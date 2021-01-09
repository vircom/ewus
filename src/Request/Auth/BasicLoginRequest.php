<?php

declare(strict_types=1);

namespace VirCom\EWUS\Request\Auth;

use VirCom\EWUS\Enum\NHFBranchIdentifierEnum;

class BasicLoginRequest
{
    public function __construct(
        protected NHFBranchIdentifierEnum $domain,
        protected string $login,
        protected string $password
    ) { }
}