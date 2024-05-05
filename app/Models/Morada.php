<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'rua',
        'bairro',
        'estado'
    ];

}
