<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['item'];
    protected $table = 'details';


    public function detailsInformation(){
        return $this->belongsTo(Information::class, 'information_id', 'id');
    }

}
