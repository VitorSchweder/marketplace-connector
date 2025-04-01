<?php

namespace App\Domain\Entities;

use App\Domain\States\ImportState;

class ImportProcess
{
    public function __construct(
        public ImportState $state
    ) {}

    public function status(): string
    {
        return $this->state->status();
    }

    public function transitionTo(ImportState $state): void
    {
        $this->state = $state;
    }
}