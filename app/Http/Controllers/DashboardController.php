<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReport;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function myBooks()
    {
        $myBooks = Book::with('genres')->with('authors')->where('user_id', auth()->user()->id)->latest()->get();
        return response()->view('dashboard.my-books',['books' => $myBooks]);
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function myReviews()
    {
        $myReviews = Review::with('book')->where('user_id', auth()->user()->id)->latest()->get();
        return response()->view('dashboard.my-reviews',['reviews' => $myReviews]);
    }

    public function myReports(Request $request)
    {
        $myReports = BookReport::latest()->where('user_id', auth()->user()->id)->get();
        return response()->view('dashboard.my-reports',['reports' => $myReports]);
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
    public function changeEmail(Request $request)
    {
        $request->validate(
            [
                'new_email' => 'required|string|min:6',
                'retype_new_email' => 'required|string|min:6',
                'current_password' => 'required'
            ]
        );

        if (!(Hash::check($request->current_password, auth()->user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp(auth()->user()->email, $request->new_email) == 0){
            return redirect()->back()->with("error","New email cannot be same as your current email. Please choose a different email.");
        }

        if(strcmp($request->new_email, $request->retype_new_email) != 0){
            return redirect()->back()->with("error","New email must be the same as your retype new email.");
        }


        //Change Email
        auth()->user()->update([
            'email' => $request->new_email
        ]);

        return redirect()->back()->with('error', 'Email changed!');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' => 'required|string|min:6',
                'retype_new_password' => 'required|string|min:6'
            ]
        );

        if (!(Hash::check($request->current_password, auth()->user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->current_password, $request->new_password) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        if(strcmp($request->new_password, $request->retype_new_password) != 0){
            return redirect()->back()->with("error","New Password must be the same as your retype new password.");
        }

        //Change Password
        $user = User::where('email', auth()->user()->email);
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('error', 'Password changed!');
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function approveBooks()
    {
        return response()->view('dashboard.approve-books', ['books' => Book::with('authors')->with('genres')->where('status', 0)->latest()->get()]);
    }

    /**
     * Display all books by logged in dashboard id.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {
        return response()->view('dashboard.reports', ['reports' => BookReport::with('book')->with('user')->latest()->get()]);
    }
}
