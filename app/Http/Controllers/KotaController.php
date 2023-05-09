<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Http\Requests\StoreKotaRequest;
use App\Http\Requests\UpdateKotaRequest;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kotas = Kota::orderBy('updated_at', 'desc')->get();
        return view('kota.index', [
            'kotas' => $kotas,
            'title' => 'Kota Page'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kotas = Kota::orderBy('updated_at', 'desc')->get();
        return view('kota.create', [
            'title' => 'Tambah kota',
            'kotas' => $kotas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $kota = Kota::create($validatedData);
        return redirect()->route('kota.index')->with('message', "Data kota <b>$kota->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kota)
    {
        return view('kota.edit', [
            'title' => 'Edit Kota',
            'kota' => $kota,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKotaRequest  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kota)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $oldkota = $kota->name;
        $kotaBaru = $kota->update($validatedData);
        return redirect()->route('kota.index')->with('message', "Data kota <b>$oldkota</b> telah berhasil <b>diperbaharui!</b>");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kota $kota)
    {
        $oldTitle = $kota->name;
        $kota->delete();

        return redirect()->route('kota.index')->with('message', "Data kota <b>$oldTitle</b> telah berhasil <b>dihapus!</b>");
    }
}
