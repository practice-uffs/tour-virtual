<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'imagensCompartilhadas';

    protected $fillable = ['autor', 'campus', 'file_name', 'email', 'comentario', 'situacao', 'estrutura'];
}
