<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;

Route::get('/', Login::class)->name('auth.login');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca el correo como verificado

    return redirect()->route('dashboard.main'); // Redirige a donde quieras después de verificar
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Correo de verificación enviado');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth', 'verified', 'role:admin'])->group(function(){
    Route::get('/dashboard/users', Dashboard::class)->name('dashboard.main');
});

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/getFile/{file}', [FileController::class, 'getFile'])->name('file.getfile');
});