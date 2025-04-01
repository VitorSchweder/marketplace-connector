<?php

namespace App\Domain\States;

class InProgressState extends ImportState
{
    public function status(): string
    {
        return 'in_progress';
    }
}