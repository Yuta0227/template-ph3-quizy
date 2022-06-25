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
        $big_question=BigQuestion::find($request->id);
        $big_question->update(['title'=>$request->title]);
        return redirect('/home');
    }
    public function add_title(Request $request){
        $validated=$request->validate([
            'title'=>'required'
        ]);
        $big_question=new BigQuestion();
        $big_question->fill(['title'=>$request->title]);
        $big_question->save();
        return redirect('/home');
    }
    public function delete_title(Request $request){
        $big_question=BigQuestion::find($request->id);
        $big_question->delete();
        return redirect('/home');
    }
    public function switch_titles(Request $request){
        if($request->from_id==$request->to_id){
            return redirect('/home');
        }
        $save_from_big_question=BigQuestion::find($request->from_id);
        $save_from_questions=QuestionList::where('big_question_id',$request->from_id)->get();
        $save_from_pictures=Picture::where('big_question_id',$request->from_id)->get();
        $save_to_big_question=BigQuestion::find($request->to_id);
        $save_to_questions=QuestionList::where('big_question_id',$request->to_id)->get();
        $save_to_pictures=Picture::where('big_question_id',$request->to_id)->get();
        $save_from_big_question->delete();
        $save_to_big_question->delete();
        $new_from_big_question=new BigQuestion();
        $new_from_big_question->fill(['id'=>$save_to_big_question->id,'title'=>$save_from_big_question->title]);
        $new_from_big_question->save();
        $new_to_big_question=new BigQuestion();
        $new_to_big_question->fill(['id'=>$save_from_big_question->id,'title'=>$save_to_big_question->title]);
        $new_to_big_question->save();
        foreach($save_from_questions as $from_question){
            $from_question->update(['big_question_id'=>$request->to_id]);
        }
        foreach($save_to_questions as $to_question){
            $to_question->update(['big_question_id'=>$request->from_id]);
        }
        foreach($save_from_pictures as $from_picture){
            $from_picture->update(['big_question_id'=>$request->to_id]);
        }
        foreach($save_to_pictures as $to_picture){
            $to_picture->update(['big_question_id'=>$request->from_id]);
        }
        return redirect('/home');
    }
    public function get_questions_to_edit($big_question_id){
        $quiz_title=BigQuestion::find($big_question_id)->title;
        $question_list=new QuestionListController();
        $questions=$question_list->unshuffled_questions($big_question_id);
        $pictures=Picture::where('big_question_id',$big_question_id)->get();
        return view('edit_quiz',compact('big_question_id','quiz_title','questions','pictures'));
    }
    public function edit_choice(Request $request,$big_question_id){
        $choice=QuestionList::find($request->id);
        $choice->update(['choice_name'=>$request->choice_name]);
        return redirect('/edit_quiz/'.$big_question_id);
    }
    public function delete_choice(Request $request,$big_question_id){
        $choice=QuestionList::find($request->id);
        $choice->delete();
        return redirect('/edit_quiz/'.$big_question_id);
    }
    public function add_choice(Request $request, $big_question_id){
        $choice=new QuestionList();
        $choice->fill(['big_question_id'=>$request->big_question_id,'question_id'=>$request->question_id,'choice_name'=>$request->choice_name,'valid'=>0]);
        $choice->save();
        return redirect('/edit_quiz/'.$big_question_id);
    }
}
