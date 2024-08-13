<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('view/page', [AppointmentController::class, 'viewPageFunction'], function () {
    })->name('view_page');

    Route::any('/create/appointment', [AppointmentController::class, 'create'], function () {
    })->name('create');

    Route::any('/update/appointment/id={appointment}', [AppointmentController::class, 'appointment_edit'], function () {
    })->name('update');

    Route::get('/delete/{appointment}', [AppointmentController::class, 'appointment_delete'], function () {
    })->name('delete');

});

require __DIR__ . '/auth.php';