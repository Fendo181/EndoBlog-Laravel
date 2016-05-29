<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Forms; //modelの名前
use App\Http\Requests\CalendarRequest;  //validation様のRequestクラスの名前空間

class CalendarController extends Controller
{
    
    public function index(){
        
        return view('calendar.index');
    }
    
    //DBから新しい順に中身を表示する事ができ
    public function note(){
        $forms=Forms::latest('created_at')->get();
        return view('calendar.note')->with('forms',$forms);
        
    }
    
     public function show($id){
        $forms=Forms::findOrFail($id);
         return view('calendar.show')->with('forms',$forms);
        
    }
   
     public function edit($id){
        $forms=Forms::findOrFail($id);
         return view('calendar.edit')->with('forms',$forms);
        
    }
    
    
    
     public function destroy($id){
        $forms=Forms::findOrFail($id);
        $forms->delete();
        return redirect('/calendar/note')->with('flash_message','記事が削除されました。');
    }
    
    public function create(){
        return view('calendar.create');
    }
    
    public function todo(){
        return view('calendar.todo');
        
    }
    
     public function store(CalendarRequest $request){
         /*
         $this->validate($request,[
             'title' =>'required|min:3',
             'body' => 'required'
         ]);*/
         
         //DBオブジェクトを作る。
        $forms=new Forms();
         
        $forms->title=$request->title;
        $forms->body=$request->body;
         
        $forms->save();
        return redirect('/calendar/note')->with('flash_message','新しいスケジュールが投稿されました!');
    }
    
     public function update(CalendarRequest $request,$id){

         //idがあるか確認する。
        $forms=Forms::findOrFail($id);
         
        $forms->title=$request->title;
        $forms->body=$request->body;
         
        $forms->save();
         
        return redirect('/calendar/note')->with('flash_message','スケジュールが更新されました!');
         
    }
    
    
    
    
}
