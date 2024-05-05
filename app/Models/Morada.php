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

    public static $rules = [
        'usuario_id'=>'required|integer',
        'rua'=>'required|string|max:50',
        'bairro'=>'required|string|max:50',
        'estado'=>'required|string|max:50',
    ];


}
