<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado', 'data_fundacao'];

    public function bairros()
    {
        return $this->hasMany(Bairro::class);
    }
}

