<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function quiz_list(Request $request,$big_question_index)
    {
        // $items=DB::select('select * from people');
        $question_lists = [
            1=>[
                1=>['こうわ', 'たかなわ', 'たかわ'],
                2=>['かめど', 'かめと', 'かめいど'],
                3=>['こうじまち', 'おかとまち', 'かゆまち']
            ],
            2=>[
                1=>['むこうひら', 'むかいなだ', 'むきひら'],
                2=>['みよし', 'おしらべ', 'みつぎ'],
                3=>['きやま', 'かなやま', 'ぎんざん']
            ],
        ];
        $quiz_titles=[
            1=>'東京の難読地名クイズ',
            2=>'広島県の難読地名クイズ'
        ];
        return view ('quiz.quiz',compact('question_lists','big_question_index','quiz_titles'));
    }
}
