<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        return response()->view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $replies = ReplyReport::all()->where('book_report_id', $id);
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
        BookReport::find($id)->delete();

        return redirect()->back()->with('message', 'Record deleted!');
    }
}
