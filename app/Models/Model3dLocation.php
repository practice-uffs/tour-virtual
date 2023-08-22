<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3dLocation extends Model
{
    use HasFactory;
    protected $fillable = ['position'];


    protected $table = 'model3d_location';


    public function model3d(){
        return $this->belongsTo(Model3d::class, 'model3d_id', 'id');
    }
}
