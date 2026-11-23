<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';

    protected $fillable = [
        'nome',
        'cpf_criptografado',
        'telefone',
        'email',
        'endereco'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'tutor_id');
    }
}
