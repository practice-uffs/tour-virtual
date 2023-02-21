<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = ['id_componente', 'group', 'campus', 'id_360', 'titulo', 'descricao', 'img_capa'];
}
