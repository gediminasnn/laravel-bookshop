<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    return redirect('/books');
});

Route::get('/books', [BookController::class, 'index'] )->name('books');

Route::get('/books/create', [BookController::class, 'create'] )->middleware('auth')->name('books.create');

Route::post('/books/create', [BookController::class, 'store'] )->middleware('auth')->name('book.store');

Route::get('/books/{id}', [BookController::class, 'show'] )->name('books.show');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
