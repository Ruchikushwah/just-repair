<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ManageService;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Public\Home;
use App\Livewire\Public\ViewService;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class);
Route::get('/service/{id}', ViewService::class);

Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class);

    Route::get('/manage-service', ManageService::class)->name('admin.manage-service');
});

Route::get('/register', Register::class);
Route::get('/login', Login::class);
