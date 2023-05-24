<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Company;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $company = Company::first();
        return view('home.message', [
            'title' => 'Pesan untuk perusahaan'
        ], compact('company'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_pengirim' => 'required',
            'jabatan_pengirim' => 'required',
            'email_pengirim' => 'required',
            'phone_pengirim' => 'required',
            'sekolah_nama' => 'required',
            'sekolah_jurusan' => 'required',
            'sekolah_kelas' => 'required',
            'sekolah_tingkat' => 'required',
            'magang_bidang' => 'required',
            'pesan_utama' => 'required',
            'file_path' => 'file',
        ], [
            'nama_pengirim.required' => 'Field Nama is required',
            'jabatan_pengirim.required' => 'Field Jabatan is required',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file_path = '';
        if ($request->file('file_path')) {
            $originalFileName = $request->file('file_path')->getClientOriginalName();
            $extension = $request->file('file_path')->getClientOriginalExtension();
            // $filenameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);
            $sekolah_nama = str_replace(' ', '-', $request->sekolah_nama);

            $formattedFileName = $sekolah_nama . '-' . $originalFileName . '-' . now()->format('Ymd') . '-' . Str::random(5) . '.' . $extension;
            $file_path = $request->file('file_path')->storeAs('file-sekolah', $formattedFileName);
        }
        // if ($request->file('file_path')) {
        //     $file_path = $request->file('file_path')->store('file-sekolah');
        // }

        $validatedData = $validator->validated();
        $validatedData['file_path'] = $file_path;
        $message = Message::create($validatedData);
        Log::create([
            'type' => 'success',
            'action' => 'store',
            'on' => 'Message',
            'description' => "Message from $message->sekolah_nama was successfully stored."
        ]);
        $data = [
            'subject' => $message->sekolah_nama,
            'body' => $message->pesan_utama
        ];
        try {
            Mail::to('ilhamprabuzakys@gmail.com')->send(new MailNotify($message));
            dd('success');
            return back()->with('message', "Pesan anda telah berhasil kami <b>simpan!</b>");
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', "Maaf terjadi kesalahan, periksa data mu <b>kembali!</b>");
        }
    }


    public function show(Message $message)
    {
        dd($message->sekolah_nama . ' is exist.');

    }

    public function edit(Message $message)
    {
        dd($message->sekolah_nama . ' was updated.');
    }

    public function update(Request $request, Message $message)
    {
        dd($request->all());
    }

    public function destroy(Message $message)
    {
        $oldTitle = $message->name;
        $message->delete();
    }
}
