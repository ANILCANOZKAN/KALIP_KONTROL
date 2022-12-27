<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KalipsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Session;
use App\Models\Category;
use App\Models\kalip;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/404', function () {
    return view('404');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/anasayfa', function () {
    return view('welcome', [
        'kalips' => kalip::latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString(),
        'categories' => Category::all(),
        'currentCategory' => Category::firstWhere('id', request('category'))
    ]);
});

//KALİPS KONTROL
Route::get('/kalips/{kalip:id}', [KalipsController::class, 'index'])->middleware('Admin');

//REGİSTER KONTROL
Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');
Route::Post('/register',[RegisterController::class, 'store'])->middleware('guest');

//SESSİON KONTROL
Route::post('/login', [Session::class, 'store'])->middleware('guest');
Route::get('/logout', [Session::class, 'destroy'])->middleware('auth');

//ADMİN KONTROL
Route::get('/administiration', [AdminController::class, 'index'])->middleware('PowerfullAdmin');
Route::get('/kalips', [AdminController::class, 'kalips'])->middleware('PowerfullAdmin');
Route::get('/categories', [AdminController::class, 'categories'])->middleware('PowerfullAdmin');
Route::get('/updates', [AdminController::class, 'updated'])->middleware('PowerfullAdmin');

Route::get('/kategoriekle', [AdminController::class, 'kategoriCreate'])->middleware('PowerfullAdmin');
Route::post('/kategoriekle', [AdminController::class, 'kategoriStore'])->middleware('PowerfullAdmin');
Route::post('/deleteKategori/{category:id}', [AdminController::class, 'deleteKategori'])->middleware('PowerfullAdmin');

Route::get('/kalipekle', [AdminController::class, 'kalipCreate'])->middleware('PowerfullAdmin');
Route::post('/kalipekle', [AdminController::class, 'kalipStore'])->middleware('PowerfullAdmin');
Route::get('/updateKalips/{kalip:id}', [AdminController::class, 'updateKalips'])->middleware('PowerfullAdmin');
Route::post('/updateKalips/{kalip:id}', [AdminController::class, 'updateKalipsStore'])->middleware('PowerfullAdmin');
Route::post('/deleteKalips/{kalip:id}', [AdminController::class, 'deleteKalips'])->middleware('PowerfullAdmin');


Route::post('/userUpdate/{user:id}', [AdminController::class, 'userUpdate'])->middleware('PowerfullAdmin');
Route::post('/userDelete/{user:id}', [AdminController::class, 'userDelete'])->middleware('PowerfullAdmin');
