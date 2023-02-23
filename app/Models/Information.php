<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = ['component', 'group', 'campus', 'identifier_360', 'title', 'description', 'cover_image'];
}
