<?php
// tests/Feature/QuizControllerTest.php
// tests/Feature/ExampleTest.php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        // Crea un usuario y simula que ha iniciado sesión
        $user = User::factory()->create();
        $this->actingAs($user);

        // Ahora realiza la solicitud a la ruta '/'
        $response = $this->get('/');

        // Verifica que el estado de la respuesta sea 200
        $response->assertStatus(200);
    }
}
