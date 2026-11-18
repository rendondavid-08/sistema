<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    public function index(){
       // return view('productos.index');
       $zonas=Zona::all();
       return view ('zonas.index', compact('zonas'));
    }
}
