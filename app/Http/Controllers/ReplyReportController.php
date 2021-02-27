<?php

namespace App\Http\Controllers;

use App\Models\BookReport;
use App\Models\ReplyReport;
use Illuminate\Http\Request;

class ReplyReportController extends Controller
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
    public function store($id, Request $request)
    {
        $report = BookReport::find($id);
        if($report->user_id != auth()->user()->id && auth()->user()->is_admin == 0)
        {
            return redirect()->back()->with('message', 'You dont have privilege to reply this report!');
        }
        ReplyReport::create([
            'book_report_id' => $id,
            'user_id' => auth()->user()->id,
            'reply' => $request->reply
        ]);

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplyReport  $replyReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReplyReport $replyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplyReport  $replyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyReport $replyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReplyReport  $replyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReplyReport $replyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplyReport  $replyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplyReport $replyReport)
    {
        //
    }
}
