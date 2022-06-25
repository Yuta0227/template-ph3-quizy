<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use App\Picture;
use App\QuestionList;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $from_question->update(['big_question_id'=>$request->to_id,'updated_at'=>date("Y-m-d H:i:s")]);
        }
        foreach($save_to_questions as $to_question){
            $to_question->update(['big_question_id'=>$request->from_id,'updated_at'=>date("Y-m-d H:i:s")]);
        }
        foreach($save_from_pictures as $from_picture){
            $from_picture->update(['big_question_id'=>$request->to_id,'updated_at'=>date("Y-m-d H:i:s")]);
        }
        foreach($save_to_pictures as $to_picture){
            $to_picture->update(['big_question_id'=>$request->from_id,'updated_at'=>date("Y-m-d H:i:s")]);
        }
        return redirect('/home');
    }
}
