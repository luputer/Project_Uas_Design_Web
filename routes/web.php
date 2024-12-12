<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// In routes/web.php  
Route::get('/', [WelcomeController::class, 'welcome']);
