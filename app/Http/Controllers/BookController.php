<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        if ($request->input('page')) {
            $currentPage = $request->input('page');
        }

        $books = Book::all();
        return response()->view('books.index',
                                [
                                    'books' => Book::all(),
                                    'previousPage' => $currentPage - 1,
                                    'nextPage' => $currentPage + 1
                                ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return response()->view('books.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'file-upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );

        $fileName = null;
        if ($request->hasFile('file-upload')) {
            $fileName = time() . '.' . $request->file('file-upload')->getClientOriginalExtension();
            echo $fileName;
            $request->file('file-upload')->move(public_path('images'), $fileName);
        }

        $discount = null;
        if ($request->has('discount')) {
            $discount = $request->discount;
        }


        $book = Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $discount,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'cover' => $fileName
            ]);

//        $book->title = $request->title;
//        $book->price = $request->price;
//        if ($request->has('discount')) {
//            $book->discount = $request->discount;
//        }
//        $book->description = $request->description;
//        $book->cover = $fileName;
//        $book->user_id = Auth::user()->id;
//        $book->save();
//

        $authors = explode(",", $request->author);
        $author_id = [];
        foreach($authors as $author) {
            $author_id[] = Author::updateOrCreate(['name' => $author])->id;
        }
        $book->genres()->sync($request->genre);
        $book->authors()->sync($author_id);

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    /**m
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->view('books.show', ['book' => Book::query()->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect()->back()->with('message', 'Record deleted!');
    }
}
