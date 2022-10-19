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
            $questions[] = $questionlib[$randomnum];
            $used_questions[] = $randomnum;
            $categories[$questionlib[$randomnum]['category']]++;
        }
        return response()->json($questions);
    }

    function provideLargest() {
        $questionlib = json_decode(file_get_contents(storage_path('/') . 'questions.json'), true);
        $questions = array();
        $longest = array();
        $qlengths = array();
        $alengths = array();
        foreach ($questionlib as $q) {
            $qlengths[] = mb_strlen($q['question'], 'UTF-8');
            $alengths[] = mb_strlen($q['answer'], 'UTF-8');
        }
        arsort($qlengths, SORT_NUMERIC);
        arsort($alengths, SORT_NUMERIC);
        $longest = array_slice($qlengths, 0, 5, true)  + array_slice($alengths, 0, 5, true);
        foreach ($longest as $key => $value) {
            $questions[] = $questionlib[$key];
        }
        return response()->json($questions);
    }

}
