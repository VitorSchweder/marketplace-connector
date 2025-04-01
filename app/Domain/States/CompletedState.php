<?php

namespace App\Domain\States;

class CompletedState extends ImportState
{
    public function status(): string
    {
        return 'completed';
    }
}