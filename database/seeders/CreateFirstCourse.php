<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateFirstCourse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'name_formation' => Str::random(10),
            'description' => Str::random(100),
            'prix' => 15,
            'id_user' => 1,
            'id_type' => 2
        ]);

        DB::table('chapitres')->insert([
            'name_chap' => Str::random(10),
            'numero' => 1,
            'cours' => Str::random(250),
            'duration' => 30,
            'id_formations' => 1
        ]);

        DB::table('chapitres')->insert([
            'name_chap' => Str::random(10),
            'numero' => 2,
            'cours' => Str::random(250),
            'duration' => 15,
            'id_formations' => 1
        ]);

        DB::table('formations_categories')->insert([
            'id_formation' => 1,
            'id_categorie' => 1
        ]);

        DB::table('categories')->insert([
           'libelle' => 'Informatique'
        ]);

        DB::table('categories')->insert([
            'libelle' => 'Politique'
        ]);

        DB::table('categories')->insert([
            'libelle' => 'Sport'
        ]);

        DB::table('types')->insert([
            'libelle' => 'Cours et exercices'
        ]);

        DB::table('types')->insert([
            'libelle' => 'Stages'
        ]);
    }
}
