<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => $karyawans
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
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $karyawan = Karyawan::create($validatedData);
        
        return response()->json([
            'data' => $karyawan
        ], 201);
    }

    public function show(Karyawan $karyawan)
    {
        return response()->json([
            'data' => $karyawan
        ]);
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
            'data' => $karyawan
        ]);
    }

    public function destroy(Karyawan $karyawan)
    {
        $oldTitle = $karyawan->name;
        $karyawan->delete();

        return response()->json(null, 204);
    }
}
