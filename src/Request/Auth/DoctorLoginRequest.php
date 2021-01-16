<?php

declare(strict_types=1);

namespace VirCom\EWUS\Request\Auth;

use VirCom\EWUS\Enum\EWUSOperatorTypeEnum;
use VirCom\EWUS\Enum\NHFBranchIdentifierEnum;

final class DoctorLoginRequest extends AbstractLoginRequest
{
    protected EWUSOperatorTypeEnum $type;

    public function __construct(
        protected NHFBranchIdentifierEnum $domain,
        protected string $login,
        protected string $password
    ) { 
        parent::__construct($domain, $login, $password);

        $this->type = EWUSOperatorTypeEnum::DOCTOR();
    }

    public function getType(): EWUSOperatorTypeEnum
    {
        return $this->type;
    }
}