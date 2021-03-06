<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
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
        return response()->view('books.index', [
            'books' => Book::with('authors')->approved()->latest()->paginate(25),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('books.create', ['genres' => Genre::all()]);
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
                'title' => 'required|string|min:6',
                'price' => 'required|integer',
                'description' => 'required|string|min:20',
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
            'user_id' => auth()->user()->id,
            'cover' => $fileName
            ]);

        $authors = explode(",", $request->author);
        $author_id = [];
        foreach($authors as $author) {
            $author_id[] = Author::updateOrCreate(['name' => $author])->id;
        }
        $book->genres()->sync($request->genre);
        $book->authors()->sync($author_id);

        return redirect()->back()->with('message', 'Book created!');
    }

    /**m
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = Review::with('user')->where('book_id', $id)->get();
        $starsArray = $reviews->pluck('stars')->toArray();
        $average = null;
        if($starsArray)
        {
            $average = round(array_sum($starsArray) / count($starsArray), 2);
        }

        return response()->view('books.show', [
            'book' => Book::find($id),
            'reviews' => $reviews,
            'stars' => $average,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::find($id);

        $genres = Genre::all();
        $bookGenres = $books->genres->pluck('id')->toArray();

        $authors = Author::all();
        $bookAuthors = $books->authors->pluck('name')->toArray();

        $bookAuthors = implode(",", $bookAuthors);

        return response()->view('books.edit', [
            'book' => $books,
            'genres' => $genres,
            'bookGenres' => $bookGenres,
            'authors' => $authors,
            'bookAuthors' => $bookAuthors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $book = Book::find($id);

        if($book->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to change this book !');
        }

        $request->validate(
            [
                'title' => 'required|string|min:6',
                'price' => 'required',
                'description' => 'required|string|min:20',
                'file-upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );

        $fileName = $book->cover;
        if ($request->hasFile('file-upload')) {
            $fileName = time() . '.' . $request->file('file-upload')->getClientOriginalExtension();
            echo $fileName;
            $request->file('file-upload')->move(public_path('images'), $fileName);
        }

        $discount = $book->discount;
        if ($request->has('discount')) {
            $discount = $request->discount;
        }


        $book->update([
            'title' => $request->title,
            'price' => $request->price,
            'discount' => $discount,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'cover' => $fileName
        ]);

        $authors = explode(",", $request->author);
        $author_id = [];
        foreach($authors as $author) {
            $author_id[] = Author::updateOrCreate(['name' => $author])->id;
        }
        $book->genres()->sync($request->genre);
        $book->authors()->sync($author_id);

        return redirect()->back()->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to destroy this book !');
        }
        $book->delete();
        return redirect(route('books.index'))->with('message', 'Book deleted!');
    }

    public function approve($id)
    {
        if(auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to approve this book !');
        }
        $book = Book::find($id);
        $book->update([
            'status' => '1'
        ]);
        return redirect()->back()->with('message', 'Book approved!');
    }

    public function search(Request $request)
    {
        return response()->view('books.index', [
            'books' => $books = Book::approved()->where( 'title', 'LIKE', '%' . $request->q . '%' )->paginate(10),
        ]);
    }
}
