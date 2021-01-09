<?php

declare(strict_types=1);

namespace VirCom\EWUS\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static EWUSServerUrlEnum PRODUCTION()
 * @method static EWUSServerUrlEnum DEVELOPMENT()
 * 
 * @psalm-immutable
 */
final class EWUSServerUrlEnum extends Enum
{
    private const PRODUCTION = 'https://ewus.nfz.gov.pl/ws-broker-server-ewus/services/';
    private const DEVELOPMENT = 'https://ewus.nfz.gov.pl/ws-broker-server-ewus-auth-test/services/';
}