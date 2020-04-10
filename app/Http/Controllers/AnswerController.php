<?php

namespace App\Http\Controllers;

use App\Model\Answer;
use App\Model\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\RequiredIf;

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

    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        
        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        $answer->update($request->validate([
            'body' => 'required'
        ]));

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your answer has been updated',
                'body_html' => $answer->body_html
            ]);
        }

        return redirect()->route('questions.show', $question->slug)->with('success', ' Your answer has been udpated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => ' Your answer has been removed',
                'body_html' => $answer->body_html
            ]);
        }

        return back()->with('success', ' Your answer has been removed');
    }
}
