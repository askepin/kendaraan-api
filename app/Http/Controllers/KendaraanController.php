<?php

namespace App\Http\Controllers;

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
        return response()->json($kendaraan);
    }

    public function store(Request $request)
    {
        $data = $request->only(['tahun_keluaran', 'warna', 'harga']);
        $kendaraan = $this->kendaraanRepository->create($data);
        return response()->json($kendaraan, 201);
    }

	public function sell(Request $request, $id)
	{
		$kendaraan = $this->kendaraanRepository->getById($id);
		if (!$kendaraan) {
			return response()->json(['message' => 'Kendaraan not found'], 404);
		}

		// Validasi dan pengolahan data penjualan dari $request

		$kendaraan->is_sold = true;
		$kendaraan->save();

		return response()->json(['message' => 'Kendaraan sold successfully']);
	}

	public function salesReport()
	{
		$soldKendaraans = $this->kendaraanRepository->getSoldKendaraans();
		$totalSales = $soldKendaraans->count();

		// Format data laporan sesuai kebutuhan Anda

		return response()->json([
			'total_sales' => $totalSales,
			'sales_data' => $soldKendaraans,
		]);
	}

    // ...
}
