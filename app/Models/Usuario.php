<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Validation\Rule;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'telefone',
        'idade',
        'biografia'
    ];

    public static function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255', Rule::regex('/^[a-zA-ZÀ-ú\s]+$/u')],
            'telefone' => 'required|string|max:20',
            'idade' => 'required|integer|min:0',
            'biografia' => 'required|string|max:500',
        ];
    }

    public function morada(): HasOne
    {
        return $this->hasOne(Morada::class);
    }
}
