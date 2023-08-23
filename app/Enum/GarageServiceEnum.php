<?php

namespace App\Enum;

enum GarageServiceEnum: string
{
    case GENERAL = 'general';
    case SUSPENSION = 'suspension';
    case ENGINE = 'engine';
    case TIRE = 'tire';
    case DETAILING = 'detailing';
    case BODYWORK = 'bodywork';
    case TUNING = 'tuning';
}
