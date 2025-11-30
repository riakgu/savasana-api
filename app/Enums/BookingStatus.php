<?php

namespace App\Enums;

enum BookingStatus: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case DONE = 'done';
    case CANCELLED = 'cancelled';
    case NO_SHOW = 'no_show';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
