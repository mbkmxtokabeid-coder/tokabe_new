<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $heroes = \App\Models\Heroe::where('status', 1)->orderBy('sort_order')->get();
    $services = \App\Models\Service::all();
    $lokasi = \App\Models\Lokasi::all();
    $lokasiooh = \App\Models\LocationOoh::all();
    $partners = \App\Models\Partner::all();

    return view('welcome', compact('heroes', 'services', 'lokasi', 'lokasiooh', 'partners'));
})->name('home');

Route::get('/services/{id}', [HomeController::class, 'showService'])->name('services.show');

// Dummy routes for "Discover More"
Route::get('/our-location/{billboard}', function($billboard) { return "This is a dummy page for $billboard."; })->name('ourLocation');
Route::get('/lokasiooh', function() { return "This is a dummy page for OOH Region."; })->name('showwilayah');

// Event IT Solution & Portofolio
Route::get('/event-it-solution', function () {
    return view('services.event-it');
})->name('event.it');

Route::get('/portofolio', function () {
    return view('portofolio');
})->name('portofolio');

// Additional services migrated from old tokabe
Route::get('/showbrand', [\App\Http\Controllers\HomeController::class, 'showBrand'])->name('brand');
Route::get('/photo-video', [\App\Http\Controllers\HomeController::class, 'showPhotography'])->name('showPhoto');
Route::get('/legality', [\App\Http\Controllers\HomeController::class, 'legality'])->name('legalitas');
Route::get('/portofolio', [\App\Http\Controllers\HomeController::class, 'portofolio'])->name('portofolio');
Route::get('/portofolio/category/{id}', [\App\Http\Controllers\HomeController::class, 'portofolioList'])->name('portofolio.list');
Route::get('/portofolio/detail/{id}', [\App\Http\Controllers\HomeController::class, 'portofolioDetail'])->name('portofolio.detail');

Route::get('/dummy-detail', function() { return view('services.dummy'); })->name('dummy.detail');
Route::get('/lokasi/ooh/{id}', [HomeController::class, 'showOohDetail'])->name('ooh.detail');
Route::get('/lokasi/dooh/{id}', [HomeController::class, 'showDoohDetail'])->name('dooh.detail');
Route::get('/discover', [App\Http\Controllers\DiscoverController::class, 'index'])->name('discover');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
