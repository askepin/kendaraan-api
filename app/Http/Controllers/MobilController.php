<?php

namespace App\Http\Controllers;

use App\Repositories\MobilRepository;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $MobilRepository;

    public function __construct(MobilRepository $MobilRepository)
    {
        $this->MobilRepository = $MobilRepository;
    }

    public function index()
    {
        $Mobils = $this->MobilRepository->getAll();
        return response()->json($Mobils);
    }

    public function show($id)
    {
        $Mobil = $this->MobilRepository->getById($id);
        return response()->json($Mobil);
    }

    public function store(Request $request)
    {
        $data = $request->only(['mesin', 'kapasitas_penumpang', 'tipe']);
        $Mobil = $this->MobilRepository->create($data);
        return response()->json($Mobil, 201);
    }

    // ...
}
