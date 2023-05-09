<?php

namespace App\Exceptions;

use Exception;

class KaryawanNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Maaf, data karyawan dengan id ' . $this->getMessage() . ' tidak ada atau telah dihapus'
        ], 404);
    }
}
