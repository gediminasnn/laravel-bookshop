<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentPage = 1;
        if($request->input('page')){
            $currentPage = $request->input('page');
        }

        $books = Book::all();
        return response()->view('books.index', ['books' => Book::all(), 'previousPage' => $currentPage-1, 'nextPage' => $currentPage+1]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'file-upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = null;
        if($request->hasFile('file-upload'))
        {
            $fileName = time().'.'.$request->file('file-upload')->getClientOriginalExtension();
            echo $fileName;
            $request->file('file-upload')->move(public_path('images'),$fileName);
        }

        $book = new Book();
        $book->title = $request->title;
        $book->price = $request->price;
        if($request->has('discount'))
        {
            $book->discount = $request->discount;
        }
        $book->description = $request->description;
        $book->cover = $fileName;
        $book->save();

        return redirect()->back()->with('message', 'IT WORKS!');

    }

    /**m
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->view('books.showw', ['book' => Book::query()->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
