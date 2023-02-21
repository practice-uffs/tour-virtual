<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'id_componente' => "a1",
            'group' => "a2",
            'campus' => "a3",
            'id_360' => "a4",
            'titulo' => "a5",
            'descricao' => "a6",
            'img_capa' => "a7"
        ]);

        Information::create([
            'id_componente' => "b1",
            'group' => "b2",
            'campus' => "b3",
            'id_360' => "b4",
            'titulo' => "b5",
            'descricao' => "b6",
            'img_capa' => "b7"
        ]);
    }
}
