<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Campos permitidos para atribuição em massa
    protected $fillable = ['nome', 'preco', 'descricao'];
}
