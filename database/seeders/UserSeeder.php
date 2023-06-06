<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory(1)->create([
            'first_name' => 'Henk',
            'last_name' => 'Hendrik',
            'student_number' => 's1122334',
            'email' => 's1122334@student.windesheim.nl',
            'ec' => 50,
            'modules' => 'Software Development 1',
            'previous_comakership' => 'geen',
        ]);
        User::factory(20)->create();
    }
}
