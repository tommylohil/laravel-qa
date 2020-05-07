<?php

namespace App\Http\Controllers\Api;

use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        return response()->json(NULL, 204);
    }

    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());

        return response()->json(NULL, 204);
    }
}
