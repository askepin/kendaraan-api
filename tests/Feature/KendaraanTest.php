<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllKendaraans()
    {
        $response = $this->get('/api/kendaraans');
        $response->assertStatus(200);
    }

    public function testGetKendaraanById()
    {
        $kendaraan = Kendaraan::factory()->create();

        $response = $this->get('/api/kendaraans/'.$kendaraan->id);
        $response->assertStatus(200);
    }

    public function testCreateKendaraan()
    {
        $data = [
            'tahun_keluaran' => 2021,
            'warna' => 'Merah',
            'harga' => 50000000
        ];

        $response = $this->post('/api/kendaraans', $data);
        $response->assertStatus(201);
    }

    // ...
}
