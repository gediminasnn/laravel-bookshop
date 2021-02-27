<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookReportController;
use App\Http\Controllers\ReplyReportController;

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

//Books routes
Route::group(['name' => 'books'], function() {
    Route::get('/books', [BookController::class, 'index'])->name('.index');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('.show');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/books/create', [BookController::class, 'create'])->name('.create');
        Route::post('/books', [BookController::class, 'store'])->name('.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('.edit');
        Route::post('/books/{id}/edit', [BookController::class, 'update'])->name('.update');
        Route::post('/books/{id}', [BookController::class, 'destroy'])->name('.destroy');
    });

    Route::get('/search', [BookController::class, 'search'])->name('.search');
    Route::post('/books/{id}/approve', [BookController::class, 'approve'])->name('.approve');
});

Route::group(['middleware' => 'auth'], function() {
//Reviews routes
    Route::resource('reviews', ReviewController::class);

//Reports routes
    Route::resource('reports', BookReportController::class);
    Route::group(['prefix' => 'reports', 'name' => 'reports'], function () {
        Route::post('/{id}/close', [BookReportController::class, 'close'])->name('.close');
    });

//Replies routes
    Route::group(['prefix' => 'reply', 'name' => 'reply'], function () {
        Route::post('/create/{id}', [ReplyReportController::class, 'store'])->name('.store');
    });

//Dashboard routes
    Route::group(['prefix' => 'dashboard','name' => 'dashboard'], function () {
        Route::get('/', function () { return redirect('/dashboard/my-books'); });
        Route::get('/my-books', [DashboardController::class, 'myBooks'])->name('.my-books');
        Route::get('/my-reviews', [DashboardController::class, 'myReviews'])->name('.my-reviews');
        Route::get('/report-a-book', [DashboardController::class, 'reportABook'])->name('.report-a-book');
        Route::get('/my-reports', [DashboardController::class, 'myReports'])->name('.my-reports');
        Route::get('/change-email', function () {return view('dashboard.change-email');})->name('.change-email-view');
        Route::post('/change-email', [DashboardController::class, 'changeEmail'])->name('.change-email');
        Route::get('/change-password', function () {return view('dashboard.change-password');})->name('.change-password-view');
        Route::post('/change-password', [DashboardController::class, 'changePassword'])->name('.change-password');
        Route::group(['middleware' => 'admin'], function() {
            Route::get('/confirm-books', [DashboardController::class, 'confirmBooks'])->name('.confirm-books');
            Route::get('/reports', [DashboardController::class, 'reports'])->name('.reports');
        });
    });
});

require __DIR__.'/auth.php';
