<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KaryawanResource;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => KaryawanResource::collection($karyawans),
            'message' => 'Fetch all karyawan',
            'success' => true
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validatedData = $validator->validated();

        $karyawan = Karyawan::create($validatedData);
        
        return response()->json([
            'data' => new KaryawanResource($karyawan),
            'message' => "Karyawan dengan nama: $karyawan->nama berhasil ditambahkan.",
            'success' => true
        ]);

        // return new KaryawanResource(true, "Karyawan $karyawan->nama berhasil ditambahkan.", $karyawan);

    }

    public function show(Karyawan $karyawan)
    {
        if($karyawan) {
            return response()->json([
                'data' => new KaryawanResource($karyawan),
                'message' => "Data karyawan dengan id $karyawan->id berhasil ditemukan.",
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'success' => false
            ], 404);
        }
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $karyawan->update($validatedData);

        return response()->json([
            'data' => new KaryawanResource($karyawan),
            'message' => "Karyawan $karyawan->nama berhasil diupdate.",
            'success' => true
        ]);
    }

    public function destroy(Karyawan $karyawan)
    {
        $oldTitle = $karyawan->nama;
        $karyawan->delete();

        // return response()->json(null, 204);
        return response()->json([
            'data' => [],
            'message' => "Karyawan dengan nama: $oldTitle telah dihapus.",
            'success' => true
        ]);
    }
}
