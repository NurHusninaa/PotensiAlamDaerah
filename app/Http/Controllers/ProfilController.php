<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        $profilMahasiswa = Profil::all();
        return view('profil.index', [
            'profilMahasiswa' => $profilMahasiswa
        ]);
    }
    
    public function show(Profil $profil) {
        return view('profil.show', [
            'profil' => $profil
        ]);
    } 
}
