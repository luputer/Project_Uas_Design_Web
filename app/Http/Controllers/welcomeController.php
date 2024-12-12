<?php

namespace App\Http\Controllers;

use App\Models\PersonalBrand; // Make sure this line is correct  
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $personalBrandData = PersonalBrand::all();  // Mengambil semua data  

    return view('welcome', compact('personalBrandData'));  

        // Cek jika data tidak ditemukan  
        if (!$personalBrandData) {
            // Tangani kasus ketika tidak ada data  
            // Misalnya, Anda bisa mengalihkan pengguna atau menampilkan pesan  
            return view('welcome')->with('message', 'Tidak ada data merek pribadi ditemukan.');
        }

        return view('welcome', compact('personalBrandData'));
    }
}
