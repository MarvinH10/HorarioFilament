<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZKController extends Controller
{
    private $zkIp = '192.168.0.201';
    private $zkPort = 4370;

    public function connection()
    {
        $output = [];
        $return_var = 0;
        exec('node ' . base_path('app/Services/ZktecoServices.cjs') . " connect {$this->zkIp} {$this->zkPort} 2>&1", $output, $return_var);

        if ($return_var !== 0) {
            return response()->json(['error' => 'Error ejecutando el script de conexión', 'details' => $output], 500);
        }

        return response()->json(['message' => '✅ Conexión establecida', 'output' => $output]);
    }

    public function getAttendance()
    {
        $connectionResponse = $this->connection();
        $connectionData = json_decode($connectionResponse->getContent(), true);

        if (isset($connectionData['error'])) {
            return response()->json(['error' => 'No se pudo conectar con el dispositivo', 'details' => $connectionData['details']], 500);
        }

        $output = [];
        $return_var = 0;
        exec('node ' . base_path('app/Services/ZktecoServices.cjs') . ' getAttendance 2>&1', $output, $return_var);

        if ($return_var !== 0) {
            return response()->json(['error' => 'Error ejecutando el script de Node.js', 'details' => $output], 500);
        }

        return response()->json(['message' => '📌 Datos de asistencia obtenidos', 'output' => $output]);
    }
}
