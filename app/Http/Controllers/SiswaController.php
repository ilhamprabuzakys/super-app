<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('updated_at', 'desc')->get();
        return view('siswa.index', [
            'siswas' => $siswas,
            'title' => 'Siswa Page'
        ]);
    }

    public function create()
    {
        $kotas = Kota::orderBy('updated_at', 'desc')->get();
        $kecamatans = Kecamatan::orderBy('updated_at', 'desc')->get();
        return view('siswa.create', [
            'title' => 'Tambah Siswa',
            'kotas' => $kotas,
            'kecamatans' => $kecamatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required|min:4',
        ], ['kota_id.required' => 'Field kota is required', 'kecamatan_id.required' => 'Field kecamatan is required']);

        $siswa = Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('message', "Data Siswa <b>$siswa->name</b> telah berhasil <b>ditambahkan!</b>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kotas = Kota::orderBy('updated_at', 'desc')->get();
        $kecamatans = Kecamatan::orderBy('updated_at', 'desc')->get();
        return view('siswa.edit', [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'kotas' => $kotas,
            'kecamatans' => $kecamatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required|min:4',
        ]);
        $namaSiswaOld = $siswa->name;
        $siswaBaru = $siswa->update($validatedData);
        return redirect()->route('siswa.index')->with('message', "Data Siswa <b>$namaSiswaOld</b> telah berhasil <b>diperbaharui!</b>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $oldTitle = $siswa->name;
        $siswa->delete();

        return redirect()->route('siswa.index')->with('message', "Data siswa <b>$oldTitle</b> telah berhasil <b>dihapus!</b>");
    }

    public function getKecamatan($kota_id)
    {
        $kecamatan = Kecamatan::where('kota_id', $kota_id)->get();
        return response()->json(['data' => $kecamatan]);
    }

    // public function pdfView()
    // {
        
    // }

    // public function rekapPDF()
    // {
    //     $siswas = Siswa::orderBy('updated_at', 'desc')->get();
    //     $details = [
    //         'siswas' => $siswas,
    //         'title' => 'Data Siswa',
    //     ];

    //     $pdf = PDF::loadview('dashboard.guru-pages.rekap_pdf', $details);
    //     return $pdf->download('laporan-kelas-siswa.pdf');
    // }
}
