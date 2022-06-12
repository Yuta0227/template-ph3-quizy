<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function quiz_list($big_question_index)
    {
        $question_list = [
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
        $quiz_title=[
            1=>'東京の難読地名クイズ',
            2=>'広島県の難読地名クイズ'
        ];
        // dd($big_question_index);
        return view ('quiz.quiz',compact('question_list','big_question_index','quiz_title'));
    }
}
