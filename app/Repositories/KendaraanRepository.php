<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{
    public function getAll()
    {
        return Kendaraan::all();
    }

    public function getById($id)
    {
        return Kendaraan::findOrFail($id);
    }

    public function create($data)
    {
        return Kendaraan::create($data);
    }

    public function update($id, $data)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->fill($data);
        $kendaraan->save();

        return $kendaraan;
    }

    public function delete($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();
    }
}
