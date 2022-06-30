<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use App\Picture;
use App\QuestionList;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use QuestionLists;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $quiz_titles=BigQuestion::all();
        return view('home',compact('user','quiz_titles'));
    }
    public function edit_title(Request $request){
        $validated=$request->validate([
            'title'=>'required'
        ]);
        $prefecture=BigQuestion::find($request->id);
        $prefecture->update(['title'=>$request->title]);
        return redirect('/home');
    }
    public function add_title(Request $request){
        $validated=$request->validate([
            'title'=>'required'
        ]);
        $prefecture=new BigQuestion();
        $prefecture->fill(['title'=>$request->title]);
        $prefecture->save();
        return redirect('/home');
    }
    public function delete_title(Request $request){
        $prefecture=BigQuestion::find($request->id);
        $prefecture->delete();
        return redirect('/home');
    }
    public function switch_titles(Request $request){
        if($request->from_id==$request->to_id){
            return redirect('/home');
        }
        $save_from_prefecture=BigQuestion::find($request->from_id);
        $save_from_questions=QuestionList::where('prefecture_id',$request->from_id)->get();
        $save_from_pictures=Picture::where('prefecture_id',$request->from_id)->get();
        $save_to_prefecture=BigQuestion::find($request->to_id);
        $save_to_questions=QuestionList::where('prefecture_id',$request->to_id)->get();
        $save_to_pictures=Picture::where('prefecture_id',$request->to_id)->get();
        $save_from_prefecture->delete();
        $save_to_prefecture->delete();
        $new_from_prefecture=new BigQuestion();
        $new_from_prefecture->fill(['id'=>$save_to_prefecture->id,'title'=>$save_from_prefecture->title]);
        $new_from_prefecture->save();
        $new_to_prefecture=new BigQuestion();
        $new_to_prefecture->fill(['id'=>$save_from_prefecture->id,'title'=>$save_to_prefecture->title]);
        $new_to_prefecture->save();
        foreach($save_from_questions as $from_question){
            $from_question->update(['prefecture_id'=>$request->to_id]);
        }
        foreach($save_to_questions as $to_question){
            $to_question->update(['prefecture_id'=>$request->from_id]);
        }
        foreach($save_from_pictures as $from_picture){
            $from_picture->update(['prefecture_id'=>$request->to_id]);
        }
        foreach($save_to_pictures as $to_picture){
            $to_picture->update(['prefecture_id'=>$request->from_id]);
        }
        return redirect('/home');
    }
    public function get_questions_to_edit($prefecture_id){
        $quiz_title=BigQuestion::find($prefecture_id)->title;
        $question_list=new QuestionListController();
        $questions=$question_list->unshuffled_questions($prefecture_id);
        $pictures=Picture::where('prefecture_id',$prefecture_id)->get();
        // dd($questions);
        return view('edit_quiz',compact('prefecture_id','quiz_title','questions','pictures'));
    }
    public function edit_choice(Request $request,$prefecture_id){
        $choice=QuestionList::find($request->id);
        $choice->update(['choice_name'=>$request->choice_name]);
        return redirect('/edit_quiz/'.$prefecture_id);
    }
    public function delete_choice(Request $request,$prefecture_id){
        $choice=QuestionList::find($request->id);
        $choice->delete();
        return redirect('/edit_quiz/'.$prefecture_id);
    }
    public function add_choice(Request $request, $prefecture_id){
        $choice=new QuestionList();
        $choice->fill(['prefecture_id'=>$request->prefecture_id,'question_id'=>$request->question_id,'choice_name'=>$request->choice_name,'valid'=>0]);
        $choice->save();
        return redirect('/edit_quiz/'.$prefecture_id);
    }
    public function add_question(Request $request,$prefecture_id){
        $question=new QuestionList();
        $question->fill(['prefecture_id'=>$prefecture_id,'question_id'=>$request->question_id,'choice_name'=>$request->correct,'valid'=>1]);
        $question->save();
        $picture=new Picture();
        $picture->fill(['prefecture_id'=>$prefecture_id,'question_id'=>$request->question_id,'picture_url'=>$request->correct.'png']);
        $picture->save();
        return redirect('/edit_quiz/'.$prefecture_id);
    }
    public function delete_question($prefecture_id,$question_id){
        $question=QuestionList::where('prefecture_id',$prefecture_id)->where('question_id',$question_id);
        $question->delete();
        $picture=Picture::where('prefecture_id',$prefecture_id)->where('question_id',$question_id);
        $picture->delete();
        return redirect('/edit_quiz/'.$prefecture_id);
    }
}
