<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



// Seed the database without losing data with Artisan Tinker
class SeedMap extends Model
{
    use HasFactory;

    public static function seedMap(string $campus, int $qnt){
        for($i = 1; $i <= $qnt; $i++){
            Information::create([
                'component' => "#item" .$i,
                'group' => "#Gitem" .$i,
                'campus' => $campus,
                'identifier_360' => '666',
                'title' => 'Titulo ' .$i,
                'description' => 'Descricao ' .$i,
                'cover_image' => 'https://static.mundoeducacao.uol.com.br/vestibular/vestibular/campus-chapeco-uffs-credito-foto-tadeu-salgado-cleber-tobiasuffs-5d24ca6ff0c4a.jpg'

            ]);
        }
    }
}
