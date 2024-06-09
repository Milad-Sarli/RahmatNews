<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');
Volt::route('/', 'home');
Volt::route('/admin', 'admin/dashboard')->name('home')->middleware('auth');
Volt::route('/users', 'admin/pages/users')->name('users')->middleware('auth');
Volt::route('/login', 'admin/login')->name('admin-login');
