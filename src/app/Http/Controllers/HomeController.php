<?php

namespace App\Http\Controllers;

use App\BigQuestion;
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
        $big_question=BigQuestion::findOrFail($request->id);
        $big_question->delete();
        return redirect('/home');
    }
}
