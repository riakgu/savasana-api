<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
