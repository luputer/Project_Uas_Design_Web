<?php

namespace App\Http\Controllers;

use App\Models\PersonalBrand; // Make sure this line is correct  
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $personalBrandData = PersonalBrand::first();

        return view('welcome', compact('personalBrandData'));
    }
}
