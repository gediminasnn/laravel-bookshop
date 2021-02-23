<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function myBooks(Request $request)
    {
        $myBooks = Book::all()->where('user_id', Auth::user()->id);
        return response()->view('dashboard.my-books',['books' => $myBooks]);
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function myComments()
    {
        return response()->view('dashboard.my-comments');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportABook()
    {
        return response()->view('dashboard.report-a-book');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeEmail()
    {
        return response()->view('dashboard.change-email');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return response()->view('dashboard.change-password');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmBooks()
    {
        return response()->view('dashboard.confirm-books');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {
        return response()->view('dashboard.reports');
    }
}
