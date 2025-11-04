<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');


Route::get('/home1', function () {
    return Inertia::render('home01/Home1');
})->name('home1');


Route::get('/home3', function () {
    return Inertia::render('home03/Home3');
})->name('home3');

Route::get('/about-us', function () {
    return Inertia::render('aboutus/AboutUs');
})->name('about');


Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
