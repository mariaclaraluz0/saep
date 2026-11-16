<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'n°_sala',
        'bloco',
        'empresa_id',
    ];

    public $timestamps = true;

    public function cliente()
    {
        return $this->belongsTo(Empresa::class);
    }
}