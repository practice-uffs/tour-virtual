<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FigmaMap extends Model
{
    use HasFactory;
    protected $table = 'figma_maps';

    protected $fillable = ['name', 'campus', 'file_name', 'file_key', 'node_id', 'viewport', 'image_link'];
}
