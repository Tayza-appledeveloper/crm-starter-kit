<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::redirect('/', '/login');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('clients', 'dashboard')->middleware(['auth', 'verified'])->name('clients');
Route::view('projects', 'dashboard')->middleware(['auth', 'verified'])->name('projects');
Route::view('quotations', 'dashboard')->middleware(['auth', 'verified'])->name('quotations');
Route::view('invoices', 'dashboard')->middleware(['auth', 'verified'])->name('invoices');
Route::view('reports', 'dashboard')->middleware(['auth', 'verified'])->name('reports');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
