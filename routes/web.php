<?php

use App\Http\Controllers\DespesaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource('despesa', DespesaController::class)->middleware(['auth']);

/*
Route::get('/despesa', 'App\Http\Controllers\DespesaController@index')->middleware(['auth'])->name('despesa.index');
Route::get('/despesa/criar', 'App\Http\Controllers\DespesaController@create')->middleware(['auth'])->name('despesa.create');
Route::get('/despesa/edit/{despesa}', 'App\Http\Controllers\DespesaController@edit')->middleware(['auth'])->name('despesa.edit');
Route::post('/despesa', 'App\Http\Controllers\DespesaController@store')->middleware(['auth'])->name('despesa.store');
Route::get('/despesa/{despesa}', 'App\Http\Controllers\DespesaController@show')->middleware(['auth'])->name('despesa.show');
Route::post('/despesa/{despesa}', 'App\Http\Controllers\DespesaController@update')->middleware(['auth'])->name('despesa.update');
Route::delete('/despesa/{despesa}', 'App\Http\Controllers\DespesaController@destroy')->middleware(['auth'])->name('despesa.delete');
*/
require __DIR__ . '/auth.php';
