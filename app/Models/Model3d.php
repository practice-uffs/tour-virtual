<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3d extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'configs', 'file'];


    protected $table = 'model3d';

    public function model3d_locations(){
        return $this->hasMany(Model3dLocations::class, 'id_model3d_locations', 'id');
    }


}
