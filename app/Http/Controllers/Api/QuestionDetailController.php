<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionDetailResource;
use App\Model\Question;
use Illuminate\Http\Request;

class QuestionDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Question $question)
    {
        $question->increment('views');
 
        return new QuestionDetailResource($question);
    }
}
