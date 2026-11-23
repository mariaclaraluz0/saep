<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';

    protected $fillable = [
        'tutor_id',
        'nome',
        'especie',
        'raca',
        'email',
        'endereco'
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'pet_id');
    }
}
