<?php

declare(strict_types=1);

namespace VirCom\EWUS\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static EWUSOperatorTypeEnum SERVICE_PROVIDER()
 * @method static EWUSOperatorTypeEnum DOCTOR()
 * 
 * @psalm-immutable
 */
final class EWUSOperatorTypeEnum extends Enum
{
    private const SERVICE_PROVIDER = 'SWD';
    private const DOCTOR = 'LEK';
}