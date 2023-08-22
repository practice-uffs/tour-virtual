<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = ['component', 'group', 'campus', 'identifier_360', 'title', 'description', 'cover_image', 'model3d'];

    protected $table = 'informations';

    public function informationDetail(){
        return $this->hasMany(Detail::class, 'id_information', 'id');
    }

    public static function siglaCampus($campus){
        switch (strtolower($campus)){
            case 'cl':
                return 'Cerro Largo';
            case 'ch':
                return 'Chapecó';
            case 'er':
                return 'Erechim';
            case 'pf':
                return 'Passo Fundo';
            case 'ls':
                return 'Laranjeiras do Sul';
            case 're':
                return 'Realeza';
            default:
                return $campus;
        }
    }
}
