<?php

namespace App\Domain\States;

abstract class ImportState
{
    abstract public function status(): string;
}