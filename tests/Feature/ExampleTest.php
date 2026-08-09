<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Lugares turisticos de El Salvador');
        $response->assertSee('Playa El Tunco');
    }

    public function test_a_tourist_place_detail_page_can_be_viewed(): void
    {
        $response = $this->get('/lugares/playa-el-tunco');

        $response->assertStatus(200);
        $response->assertSee('Solicitar informacion');
        $response->assertSee('Surf');
    }

    public function test_a_contact_request_can_be_submitted(): void
    {
        $response = $this->post('/lugares/playa-el-tunco/contacto', [
            'nombre' => 'Maria Perez',
            'email' => 'maria@example.com',
            'mensaje' => 'Quiero recibir mas informacion para visitar este destino.',
        ]);

        $response->assertRedirect('/lugares/playa-el-tunco');
        $response->assertSessionHas('status');
    }
}
