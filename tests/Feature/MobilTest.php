<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MobilTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllMobils()
    {
        $response = $this->get('/api/mobils');
        $response->assertStatus(200);
    }

    public function testGetMobilById()
    {
        $mobil = Mobil::factory()->create();

        $response = $this->get('/api/mobils/'.$mobil->id);
        $response->assertStatus(200);
    }

    public function testCreateMobil()
    {
        $data = [
            'mesin' => 'Mesin Baru',
            'kapasitas_penumpang' => 4,
            'tipe' => 'Sedan'
        ];

        $response = $this->post('/api/mobils', $data);
        $response->assertStatus(201);
    }

    // ...
}
