<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class ImportProcess extends Model
{
    protected $table = 'import_processes';

    protected $fillable = ['state'];

    public function getStatus()
    {
        return $this->state;
    }
}