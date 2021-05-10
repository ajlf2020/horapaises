<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class relojController extends Controller
{
    //
    public function index()
    {
        $paisesReloj = [
            ['zonaHora' => 'America/Argentina/Buenos_Aires',
             'pais'     => 'Argentina'],
             ['zonaHora' => 'America/Mexico_City',
             'pais'     => 'Mexico'],
             ['zonaHora' => 'Europe/Madrid',
             'pais'     => 'España'],
             ['zonaHora' => 'Pacific/Auckland',
             'pais'     => 'Nueva Zelanda'],
             ['zonaHora' => 'Asia/Hong_Kong',
             'pais'     => 'Hong Kong']
        ];
        return view('inicio')->with('paisesReloj', $paisesReloj);
    }
    public function obtenerFechas(Request $request)
    {
        //return $request;
        $zonaHoraria = $request['id'];
        $fecha = Carbon::now($zonaHoraria);

       
        return $fecha->toDateTimeString();
        
        
    }
}
