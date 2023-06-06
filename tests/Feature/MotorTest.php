<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MotorTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllMotors()
    {
        $response = $this->get('/api/motors');
        $response->assertStatus(200);
    }

    public function testGetMotorById()
    {
        $motor = Motor::factory()->create();

        $response = $this->get('/api/motors/'.$motor->id);
        $response->assertStatus(200);
    }

    public function testCreateMotor()
    {
        $data = [
            'mesin' => 'Mesin Baru',
            'tipe_suspensi' => 'Suspensi Baru',
            'tipe_transmisi' => 'Transmisi Baru'
        ];

        $response = $this->post('/api/motors', $data);
        $response->assertStatus(201);
    }

    // ...
}
