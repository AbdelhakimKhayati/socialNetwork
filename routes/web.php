<?php


use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PublicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


| GET : Lecture
| POST : Ajouter
| PUT/PATCH : Modification
| DELETE : supprimer

|
*/

// Route::get('/profiles',[profileController::class, 'index'])->name('profile.index');
// Route::get('/profiles/create',[profileController::class, 'create'])->name('profile.create');
// Route::post('/profiles',[profileController::class, 'store'])->name('profile.store');
// Route::get('/profiles/{profile}/edit',[profileController::class, 'edit'])->name('profile.edit');
// Route::put('/profiles/{profile}',[profileController::class, 'update'])->name('profile.update');
// Route::delete('/profiles/{profile}',[profileController::class, 'destroy'])->name('profile.destroy');
// Route::get('/profiles/{profile}',[profileController::class, 'show'])->where('id', '/d+')->name('profile.show');




// Route::name('profile.')->prefix('profiles')->group(function(){
    //     Route::controller(profileController::class)->group(function(){
        //     Route::get('/', 'index')->name('index');
        //     Route::get('/create', 'create')->name('create');
        //     Route::post('/', 'store')->name('store');
//     Route::get('/{profile}/edit', 'edit')->name('edit');
//     Route::put('/{profile}', 'update')->name('update');
//     Route::delete('/{profile}', 'destroy')->name('destroy');
//     Route::get('/{profile}', 'show')->where('id', '/d+')->name('show');
//     });
// });



Route::get('/',[PublicationController::class, 'index'])->name('home');

// Controller resource !!
Route::resource('profile', profileController::class);
Route::resource('publication', PublicationController::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::Post('/login', [LoginController::class, 'store'])->name('login.store');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/information',[InformationController::class, 'index'])->name('information.index');

