<?php

use App\Livewire\Public\Home;
use App\Livewire\Public\ViewService;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class);
Route::get('/service/{id}', ViewService::class);
