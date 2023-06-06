<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\MotorRepository;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    protected $MotorRepository;

    public function __construct(MotorRepository $MotorRepository)
    {
        $this->MotorRepository = $MotorRepository;
    }

    public function index()
    {
        $Motors = $this->MotorRepository->getAll();
        return response()->json($Motors);
    }

    public function show($id)
    {
        $Motor = $this->MotorRepository->getById($id);
        if ($Motor) {
            return response()->json($Motor);
        }
        return response()->json(['message' => 'Motor not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->only(['mesin', 'tipe_suspensi', 'tipe_transmisi']);
        $Motor = $this->MotorRepository->create($data);
        return response()->json($Motor, 201);
    }

    // ...
}
