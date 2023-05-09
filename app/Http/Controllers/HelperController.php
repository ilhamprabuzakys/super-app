<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function getKecamatan($kota_id)
    {
        $kecamatan = Kecamatan::where('kota_id', $kota_id)->get();
        return response()->json(['data' => $kecamatan]);
    }
}
