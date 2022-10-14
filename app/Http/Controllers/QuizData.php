<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizData extends Controller
{
    function provideQuestions() {
        $questionlib = json_decode(file_get_contents(storage_path('/') . '/questions.json'));
        $questions = array();
        for ($i = 0; $i < 5; $i++) {
            array_push($questions, $questionlib[$i]);
        }
        return response()->json($questions);
    }
}
