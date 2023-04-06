<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pdfController;
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


Route::get('generate-pdf/{id}', [pdfController::class, 'generatePDF']);

Route::get('/add', [pdfController::class, 'add']);
Route::post('/addrecord', [pdfController::class, 'addrecord']);
Route::get('/fetch', [pdfController::class, 'fetch']);

