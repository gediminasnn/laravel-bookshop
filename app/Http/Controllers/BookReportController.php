<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReport;
use App\Models\ReplyReport;
use Illuminate\Http\Request;

class BookReportController extends Controller
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
    public function create(Request $request)
    {
        $id = null;
        if($request->has('id'))
        {
            $id = $request->input('id');
        }
        return response()->view('reports.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Book::where($request->book_id))
        {
            return redirect()->back()->with('message', 'Book doesnt exist!');
        }

        BookReport::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'report' => $request->report
        ]);

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookReport  $bookReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = BookReport::findOrFail($id);

        if($report->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to see this report !');
        }
        $replies = ReplyReport::with('user')->where('book_report_id', $id)->latest()->get();
        return response()->view('reports.show', [
            'report' => $report,
            'replies' => $replies
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookReport  $bookReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BookReport $bookReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookReport  $bookReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookReport $bookReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookReport  $bookReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = BookReport::findOrFail($id);
        if(auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have access to destroy this book !');
        }
        $report->delete();
        return redirect()->back()->with('message', 'Report deleted!');
    }

    public function close($id)
    {
        $book = BookReport::find($id);
        $book->update([
            'status' => '0'
        ]);

        return redirect()->back()->with('message', 'Report closed!');
    }
}
