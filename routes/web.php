<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ManageAppointment;
use App\Livewire\Admin\ManageBanner;
use App\Livewire\Admin\ManageRequirement;
use App\Livewire\Admin\ManageService;
use App\Livewire\Admin\ManageServiceOn;
use App\Livewire\Admin\ManageUser;
use App\Livewire\Admin\ViewAppointment;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Public\Home;
use App\Livewire\Public\MyBookig;
use App\Livewire\Public\ViewService;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class)->name('homepage');
Route::get('/service/{id}', ViewService::class);
Route::get('/my-booking', MyBookig::class)->name('my-booking');

Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class);
    Route::get('/manage-service', ManageService::class)->name('admin.manage-service');
    Route::get('/manage-service-on', ManageServiceOn::class)->name('admin.manage-service-on');
   Route::get('/manage-requirement', ManageRequirement::class)->name('admin.manage-requirement');
    Route::get('/manage-appointment', ManageAppointment::class)->name('admin.manage-appointment');
    Route::get('/manage-Banner', ManageBanner::class)->name('admin.manage-banner');
    Route::get('manage-user',ManageUser::class)->name('admin.manage-user');
    Route::get('view-appointment/{appointmentId}',ViewAppointment::class)->name('admin.view-appointment');
});

Route::get('/register', Register::class)->name('auth.register');
Route::get('/login', Login::class)->name('auth.login');
Route::get('/logout', [Login::class, 'logout'])->name('auth.logout');
 
