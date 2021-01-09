<?php

declare(strict_types=1);

namespace VirCom\EWUS\Request\Auth;

use VirCom\EWUS\Enum\EWUSOperatorTypeEnum;
use VirCom\EWUS\Enum\NHFBranchIdentifierEnum;

class ServiceProviderLoginRequest extends DoctorLoginRequest
{
    protected EWUSOperatorTypeEnum $type;

    public function __construct(
        protected NHFBranchIdentifierEnum $domain,
        protected string $serviceProviderIdentifier,
        protected string $login,
        protected string $password
    ) { 
        parent::__construct($domain, $login, $password);

        $this->type = EWUSOperatorTypeEnum::SERVICE_PROVIDER();
    }

    public function getServiceProviderIdentifier(): string
    {
        return $this->serviceProviderIdentifier;
    }
}