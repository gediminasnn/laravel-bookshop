<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Book::where($request->get('id'))->exist())
        {
            return redirect()->back()->with('message', 'Book doesnt exist!');
        }

        Review::create([
            'book_id' => $request->get('id'),
            'user_id' => auth()->user()->id,
            'stars' => $request->star,
            'comment' => $request->comment
        ]);

        return redirect()->route('books.show',$request->get('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);

        if($review->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to edit this review!');
        }

        return response()->view('reviews.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if($review->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to update this review!');
        }

        $review->update([
            'stars' => $request->star,
            'comment' => $request->comment
        ]);
        return redirect()->route('books.show',['id' => $review->book_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if($review->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to destroy this review!');
        }

        $review->delete();

        return redirect()->back();
    }
}
