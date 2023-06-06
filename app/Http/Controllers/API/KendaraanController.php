<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\KendaraanRepository;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function index()
    {
        $kendaraans = $this->kendaraanRepository->getAll();
        return response()->json($kendaraans);
    }

    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->getById($id);
        if ($kendaraan) {
            return response()->json($kendaraan);
        }
        return response()->json(['message' => 'Kendaraan not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->only(['tahun_keluaran', 'warna', 'harga']);
        $kendaraan = $this->kendaraanRepository->create($data);
        return response()->json($kendaraan, 201);
    }

    // ...
}
