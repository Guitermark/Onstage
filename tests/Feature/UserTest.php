<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    
    public function test_questions_page_can_be_rendered(): void
    {
        $response = $this->get('/questions');

        $response->assertStatus(200);
    }

    public function test_new_students_can_send_form()
    {
        $response = $this->post('/questions',[
            'first_name' => 'Henk',
            'last_name' => 'Hendrik',
            'student_number' => 's1122334',
            'email' => 's1122334@student.windesheim.nl',
            'ec' => '50',
            'modules' => 'Software Development 1',
        ]);

        // $response->assertRedirect('questions/show');
        
        $response->assertStatus(200);
    }
}
