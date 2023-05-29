<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_categories')->insert([[

            'description' => 'Comakership organisatie'
        ], [
            'description' => 'Inzoomen op de opdracht'
        ], [
            'description' => 'Taken en activiteiten'
        ], [
            'description' => 'Verwachtingen binnen de comakership'
        ], ]);
        DB::table('question_categories')->insert([
            'description' => 'Competentie verantwoording',
            'custom_input' => 'competentie'
        ]);
    }
}
