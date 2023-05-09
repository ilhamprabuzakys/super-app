<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::orderBy('updated_at', 'desc')->get();
        return view('karyawan.list', [
            'title' => 'Daftar Karyawan',
        ], compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create', [
            'title' => 'Create Karyawan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
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
        Log::create([
            'user_id' => auth()->user()->id,
            'type' => 'success',
            'action' => 'store',
            'on' => 'Karyawan',
            'description' => "Karyawan data $karyawan->nama was successfully stored."
        ]);

        return redirect()->route('karyawan.index')->with('message', "Data Karyawan <b>$karyawan->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'title' => 'Edit Karyawan',
        ], compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
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
        Log::create([
            'user_id' => auth()->user()->id,
            'type' => 'success',
            'action' => 'store',
            'on' => 'Karyawan',
            'description' => "Karyawan data $karyawan->nama was successfully updated."
        ]);

        return redirect()->route('karyawan.index')->with('message', "Data Karyawan <b>$karyawan->name</b> telah berhasil <b>diupdate!</b>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $oldTitle = $karyawan->name;
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('message', "Data karyawan <b>$oldTitle</b> telah berhasil <b>dihapus!</b>");
    }
}
