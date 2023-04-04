<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public const DUVIDAS = 0;
    public const CRITICAS = 1;
    public const SUGESTAO = 2;

    protected $table = 'feedback';

    protected $fillable = ['nome','email','type','feedback'];

}
