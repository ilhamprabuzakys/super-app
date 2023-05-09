<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::orderBy('updated_at', 'desc')->get();
        $kotas = Kota::orderBy('updated_at', 'desc')->get();
        return view('kecamatan.index', [
            'kecamatans' => $kecamatans,
            'kotas' => $kotas,
            'title' => 'Kecamatan Page'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::orderBy('updated_at', 'desc')->get();
        return view('kecamatan.create', [
            'title' => 'Tambah Kecamatan',
            'kecamatans' => $kecamatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKecamatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kota_id' => 'required'
        ]);

        $kecamatan = Kecamatan::create($validatedData);
        return redirect()->route('kecamatan.index')->with('message', "Data kecamatan <b>$kecamatan->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', [
            'title' => 'Edit Kecamatan',
            'kecamatan' => $kecamatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKecamatanRequest  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kota_id' => 'required'
        ]);
        $oldKecamatan = $kecamatan->name;
        $kecamatanBaru = $kecamatan->update($validatedData);
        return redirect()->route('kecamatan.index')->with('message', "Data kecamatan <b>$oldKecamatan</b> telah berhasil <b>diperbaharui!</b>");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $oldTitle = $kecamatan->name;
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('message', "Data kecamatan <b>$oldTitle</b> telah berhasil <b>dihapus!</b>");
    }
}
