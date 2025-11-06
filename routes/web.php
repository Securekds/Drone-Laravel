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


Route::get('/awesome-services', function () {
    return Inertia::render('services/Services');
})->name('services');

Route::get('/service-details', function () {
    return Inertia::render('servicedetails/service-details');
})->name('servicedetails');


Route::get('/drone-pilot-training', function () {
    return Inertia::render('trainingpilot/training-pilot');
})->name('trainingpilot');

Route::get('/explore-drone-platform', function () {
    return Inertia::render('droneplatform/drone-platform');
})->name('droneplatform');

Route::get('/frequently-asked-questions', function () {
    return Inertia::render('askedquestions/asked-questions');
})->name('askedquestions');

Route::get('/gallery-classic', function () {
    return Inertia::render('galleryclassic/gallery-classic');
})->name('galleryclassic');


Route::get('/gallery-masonry', function () {
    return Inertia::render('gallerymasonry/gallery-masonry');
})->name('gallerymasonry');


Route::get('/right-sidebar-default-page', function () {
    return Inertia::render('rightsidebar/right-sidebar');
})->name('rightsidebar');



Route::get('/left-sidebar-default-page', function () {
    return Inertia::render('leftsidebar/left-sidebar');
})->name('leftsidebar');


Route::get('/full-width-default-page', function () {
    return Inertia::render('defaultpage/default-page');
})->name('defaultpage');



Route::get('/cases', function () {
    return Inertia::render('cases/cases');
})->name('cases');

Route::get('/cases-details', function () {
    return Inertia::render('casesdetails/cases-details');
})->name('casesdetails');

Route::get('/shop', function () {
    return Inertia::render('shop/shop');
})->name('shop');

Route::get('/single-product', function () {
    return Inertia::render('singleproduct/single-product');
})->name('singleproduct');


Route::get('/cart-2', function () {
    return Inertia::render('cart-2/ckeckoutcart');
})->name('singleproduct');


Route::get('/my-account-2', function () {
    return Inertia::render('my-account-2/myaccount');
})->name('my-account-2');



Route::get('/blog', function () {
    return Inertia::render('blog/blog');
})->name('blog');


Route::get('/single-blog', function () {
    return Inertia::render('singleblog/single-blog');
})->name('singleblog');


Route::get('/contact', function () {
    return Inertia::render('contact/contact');
})->name('contact');



Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
