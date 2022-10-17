<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizData extends Controller
{
    function provideQuestions() {
        $questionlib = json_decode(file_get_contents(storage_path('/') . '/questions.json'), true);

        $qlibcount = count($questionlib);
        $questions = array();
        $used_questions = array();
        $categories = array('Film & TV' => 0,
                            'Geografi' => 0,
                            'Historia' => 0,
                            'Musik' => 0,
                            'Övrigt' => 0,
                            'Vetenskap' => 0,
                            'Sport' => 0);

        while (count($questions) < 35) {
            $randomnum = random_int(0, $qlibcount - 1);
            if ($categories[$questionlib[$randomnum]['category']] >= 5) {
                continue;
            }
            if (in_array($randomnum, $used_questions, true)) {
                continue;
            }
            array_push($questions, $questionlib[$randomnum]);
            $categories[$questionlib[$randomnum]['category']]++;
        }
        return response()->json($questions);
    }
}
