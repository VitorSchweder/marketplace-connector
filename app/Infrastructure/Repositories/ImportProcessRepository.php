<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Interfaces\ImportProcessRepositoryInterface;
use App\Infrastructure\Models\ImportProcess;

class ImportProcessRepository implements ImportProcessRepositoryInterface
{
    public function createWithState(string $state): ImportProcess
    {
        return ImportProcess::create(['state' => $state]);
    }

    public function findLatest(): ?ImportProcess
    {
        return ImportProcess::latest()->first();
    }

    public function updateState(ImportProcess $process, string $state): void
    {
        $process->update(['state' => $state]);
    }
}