<?php

namespace App\Domain\Interfaces;

use App\Infrastructure\Models\ImportProcess;

interface ImportProcessRepositoryInterface
{
    /**
     * Cria um novo processo de importação com estado informado.
     *
     * @param string $state
     * @return ImportProcess
     */
    public function createWithState(string $state): ImportProcess;

    /**
     * Retorna o último processo criado.
     *
     * @return ImportProcess|null
     */
    public function findLatest(): ?ImportProcess;

    /**
     * Atualiza o estado de um processo existente.
     *
     * @param ImportProcess $process
     * @param string $state
     */
    public function updateState(ImportProcess $process, string $state): void;
}
