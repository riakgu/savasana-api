<?php

namespace App\Enums;

enum ServiceTarget: string
{
    case MOM = 'mom';
    case BABY = 'baby';
    case TODDLER = 'toddler';
    case KID = 'kid';
    case ALL = 'all';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
