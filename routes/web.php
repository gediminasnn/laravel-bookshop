<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;

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

Route::post('/books/{id}', [BookController::class, 'destroy'] )->name('books.destroy');

Route::get('/books/{id}/edit', [BookController::class, 'edit'] )->name('books.edit');

Route::post('/books/{id}/edit', [BookController::class, 'update'] )->name('books.update');



Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');

Route::post('/reviews/{id}/edit', [ReviewController::class, 'update'])->name('reviews.update');

Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews.store');

Route::post('/reviews/{id}', [ReviewController::class, 'destroy'] )->name('reviews.destroy');



Route::get('/dashboard', function () {
    return redirect('/dashboard/my-books');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/my-books',[DashboardController::class, 'myBooks'])->middleware(['auth'])->name('dashboard.my-books');

Route::get('/dashboard/my-reviews',[DashboardController::class, 'myReviews'])->middleware(['auth'])->name('dashboard.my-reviews');

Route::get('/dashboard/report-a-book',[DashboardController::class, 'reportABook'])->middleware(['auth'])->name('dashboard.report-a-book');

Route::get('/dashboard/my-reports',[DashboardController::class, 'myReports'])->middleware(['auth'])->name('dashboard.my-reports');

Route::get('/dashboard/change-email',[DashboardController::class, 'changeEmail'])->middleware(['auth'])->name('dashboard.change-email');

Route::get('/dashboard/change-password',[DashboardController::class, 'changePassword'])->middleware(['auth'])->name('dashboard.change-password');

Route::get('/dashboard/confirm-books',[DashboardController::class, 'confirmBooks'])->middleware(['auth'])->name('dashboard.confirm-books');

Route::get('/dashboard/reports',[DashboardController::class, 'reports'])->middleware(['auth'])->name('dashboard.reports');


require __DIR__.'/auth.php';
