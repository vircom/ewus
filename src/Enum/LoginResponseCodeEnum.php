<?php

declare(strict_types=1);

namespace VirCom\EWUS\V5\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static LoginResponseCodeEnum _000()
 * @method static LoginResponseCodeEnum _001()
 * @method static LoginResponseCodeEnum _002()
 * @method static LoginResponseCodeEnum _003()
 * 
 * @psalm-immutable
 */
final class LoginResponseCodeEnum extends Enum
{
    private const _000 = 'The user has been logged in correctly';
    private const _001 = 'Attention! In {N} days, the password will expire! Please change the password on the correct portal in the National Health Fund';
    private const _002 = 'Attention! The password will expire in 1 day! Please change the password on the correct portal in the National Health Fund';
    private const _003 = 'Attention! At the end of today, the password will expire! Please change the password on the correct portal in the National Health Fund';
}