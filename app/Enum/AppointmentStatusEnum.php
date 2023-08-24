<?php

namespace App\Enum;

enum AppointmentStatusEnum: string
{
    case REQUESTED = 'requested';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
