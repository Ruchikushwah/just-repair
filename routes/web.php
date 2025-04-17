<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Invoice;
use App\Livewire\Admin\ManageAppointment;
use App\Livewire\Admin\ManageBanner;
use App\Livewire\Admin\ManageRequirement;
use App\Livewire\Admin\ManageService;
use App\Livewire\Admin\ManageServiceOn;
use App\Livewire\Admin\ManageUser;

use App\Livewire\Admin\ServiceView;
use App\Livewire\Admin\Setting;
use App\Livewire\Admin\ViewAppointment;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Public\BookAppointment;
use App\Livewire\Public\Home;
use App\Livewire\Public\MyBookig;
use App\Livewire\Public\Service;
use App\Livewire\Public\TrackAppointment;
use App\Livewire\Public\ViewService;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\Public\BookingSuccess;


Route::get('/', Home::class)->name('homepage');
Route::get('/service/{id}', ViewService::class)->name('service.view');
Route::get('/my-booking', MyBookig::class)->name('my-booking');
Route::get('/booking/success/{jobNumber}', BookingSuccess::class)->name('booking.success');
Route::get('/book-appointment/{serviceId}/{serviceOnId}/{requirements}', BookAppointment::class)->name('book-appointment');
Route::get('/track-appointment', TrackAppointment::class)->name('track-appointment');
Route::get('/services-{type?}', Service::class)->name('public-services');
// Route::get('/booking/success/{jobNumber}', function($jobNumber) {
//     return view('booking.success', compact('jobNumber'));
// })->name('booking.success');


Route::middleware(['auth'])->group(function () {
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/admin-dashboard', Dashboard::class)->name('admin.dashboard');

        Route::get('/manage-service', ManageService::class)->name('admin.manage-service');
        Route::get('/manage-service-on', ManageServiceOn::class)->name('admin.manage-service-on');
        Route::get('/manage-requirement', ManageRequirement::class)->name('admin.manage-requirement');
        Route::get('/manage-appointment', ManageAppointment::class)->name('admin.manage-appointment');
        Route::get('/manage-Banner', ManageBanner::class)->name('admin.manage-banner');
        Route::get('/manage-user', ManageUser::class)->name('admin.manage-user');
        Route::get('/view-appointment/{appointmentId}', ViewAppointment::class)->name('admin.view-appointment');
        Route::get('/service-view/{serviceId}', ServiceView::class)->name('admin.service-view');
        Route::get('/setting', Setting::class)->name('admin.setting');
        Route::get('/invoice/{appointmentId}/{selectedServiceFees}', Invoice::class)->name('admin.invoice');
    });
});

Route::get('/register', Register::class)->name('auth.register');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', [Login::class, 'logout'])->name('auth.logout');
