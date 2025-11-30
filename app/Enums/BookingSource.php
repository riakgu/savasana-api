<?php

namespace App\Enums;

enum BookingSource: string
{
    case WHATSAPP = 'whatsapp';
    case PHONE = 'phone';
    case WALK_IN = 'walk_in';
    case OTHER = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
