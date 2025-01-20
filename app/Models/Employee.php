<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'cargo',
        'departamento',
        'id_cracha',
        'foto',
    ];
}