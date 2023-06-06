<?php

namespace App\Http\Controllers;

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
        return response()->json($Motor);
    }

    public function store(Request $request)
    {
        $data = $request->only(['mesin', 'tipe_suspensi', 'tipe_transmisi']);
        $Motor = $this->MotorRepository->create($data);
        return response()->json($Motor, 201);
    }

    // ...
}
