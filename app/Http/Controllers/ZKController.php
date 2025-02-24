<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZKController extends Controller
{
    //
    public function getAttendance()
    {
        $output = [];
        $return_var = 0;
        exec('node ' . public_path('zkteco/zkteco.cjs'). ' 2>&1', $output, $return_var);

        if ($return_var !== 0) {
            return response()->json(['error' => 'Error ejecutando el script de Node.js'], 500);
        }

        return response()->json(['output' => $output]);
    }
}
