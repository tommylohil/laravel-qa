<?php

namespace App\Http\Controllers;

use App\Model\Answer;
use App\Model\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
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
    public function store(Question $question, Request $request)
    {
        $question->answers()->create($request->validate([
            'body' => 'required',
        ]) + [
            'user_id' => \Auth::id(),
        ]);

        return back()->with('success', " Your answer has been submitted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
