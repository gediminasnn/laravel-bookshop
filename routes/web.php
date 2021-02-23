<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;

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
    return redirect('/dashboard/my-books');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/my-books',[DashboardController::class, 'myBooks'])->middleware(['auth'])->name('dashboard.my-books');

Route::get('/dashboard/my-comments',[DashboardController::class, 'myComments'])->middleware(['auth'])->name('dashboard.my-comments');

Route::get('/dashboard/report-a-book',[DashboardController::class, 'reportABook'])->middleware(['auth'])->name('dashboard.report-a-book');

Route::get('/dashboard/change-email',[DashboardController::class, 'changeEmail'])->middleware(['auth'])->name('dashboard.change-email');

Route::get('/dashboard/change-password',[DashboardController::class, 'changePassword'])->middleware(['auth'])->name('dashboard.change-password');

Route::get('/dashboard/confirm-books',[DashboardController::class, 'confirmBooks'])->middleware(['auth'])->name('dashboard.confirm-books');

Route::get('/dashboard/reports',[DashboardController::class, 'reports'])->middleware(['auth'])->name('dashboard.reports');


require __DIR__.'/auth.php';
