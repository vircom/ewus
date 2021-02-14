<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static EWUSXMLNamespacesEnum XMLNS_SOAPENV()
 * @method static EWUSXMLNamespacesEnum XMLNS_AUTH()
 * 
 * @psalm-immutable
 */
class EWUSXMLNamespacesEnum extends Enum
{
    private const XMLNS_SOAPENV = 'http://schemas.xmlsoap.org/soap/envelope/';
    private const XMLNS_AUTH = 'http://xml.kamsoft.pl/ws/kaas/login_types';
}