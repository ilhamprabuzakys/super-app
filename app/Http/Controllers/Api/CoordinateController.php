<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoordinateResource;
use App\Models\Coordinate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CoordinateController extends Controller
{
    public function indexredis()
    {
        // $coordinates = User::orderBy('updated_at', 'desc')->get();
        // $job = new coordinatesJob();
        // $this->dispatch($job);
        $coordinates = Cache::remember('coordinates', 10*60, function() {
            return Coordinate::orderBy('updated_at', 'desc')->get();
        });
        
        return response()->json([
        'data' => CoordinateResource::collection($coordinates),
        'message' => 'Fetch all Markers Data',
            'success' => true
        ]);
    }
    
    public function index()
    {
        $coordinates = Coordinate::orderBy('updated_at', 'desc')->get();
        return response()->json([
        'data' => CoordinateResource::collection($coordinates),
        'message' => 'Fetch all Markers Data',
            'success' => true
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validatedData = $validator->validated();

        $coordinate = Coordinate::create($validatedData);

        return response()->json([
            'data' => new CoordinateResource($coordinate),
            'message' => "coordinate dengan nama: $coordinate->name berhasil ditambahkan.",
            'success' => true
        ]);
    }

    public function show(Coordinate $coordinate)
    {
        if ($coordinate) {
            return response()->json([
                'data' => new CoordinateResource($coordinate),
                'message' => "Data coordinate dengan id $coordinate->id berhasil ditemukan.",
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan.',
                'success' => false
            ], 404);
        }
    }

    public function update(Request $request, Coordinate $coordinate)
    {
        $validator = Validator::make($request->all(), [
            'name' => '',
            'latitude' => '',
            'longitude' => '',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            // return redirect()->back()->withErrors($validator)->withInput();
            return response()->json([
                'data' => $validator->fails(),
                'message' => "Something went wrong",
                'success' => \false
            ], 500);
        }

        $validatedData = $validator->validated();

        $coordinate->update($validatedData);

        return response()->json([
            'data' => new CoordinateResource($coordinate),
            'message' => "User $coordinate->name berhasil diupdate.",
            'success' => true
        ]);
    }

    public function destroy(Coordinate $coordinate)
    {
        $oldTitle = $coordinate->name;
        $coordinate->delete();

        // return response()->json(null, 204);
        return response()->json([
            'data' => [],
            'message' => "Coordinate dengan nama: $oldTitle telah dihapus.",
            'success' => true
        ]);
    }
}
