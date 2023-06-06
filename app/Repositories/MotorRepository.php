<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepository
{
    public function getAll()
    {
        return Motor::all();
    }

    public function getById($id)
    {
        return Motor::findOrFail($id);
    }

    public function create($data)
    {
        return Motor::create($data);
    }

    public function update($id, $data)
    {
        $Motor = Motor::findOrFail($id);
        $Motor->fill($data);
        $Motor->save();

        return $Motor;
    }

    public function delete($id)
    {
        $Motor = Motor::findOrFail($id);
        $Motor->delete();
    }
}
