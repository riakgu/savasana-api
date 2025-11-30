<?php

namespace App\Enums;

enum ClientType: string
{
    case MOM = 'mom';
    case BABY = 'baby';
    case TODDLER = 'toddler';
    case KID = 'kid';
}
