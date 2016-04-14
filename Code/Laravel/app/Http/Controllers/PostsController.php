<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
//Postrequest
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //storeメソッド
    public function store(PostRequest $request){
        
        /*
        $this->validate($request, [
        'title' => 'required|min:3',
        'body' => 'required'
        ]);
        */
        
        $post = new Post();
        $post->title =$request->title;
        $post->body  =$request->body;
        $post->save();
        
        return redirect('/')->with('flash_message', 'Add new!');
    }
    
    //updateメソッド
    public function update(PostRequest $request,$id){
        /*
        $this->validate($request, [
        'title' => 'required|min:3',
        'body' => 'required'
        ]);
        */
        
        //id取得
        $post =Post::findOrFail($id);
        $post->title =$request->title;
        $post->body  =$request->body;
        $post->save();
        
        return redirect('/')->with('flash_message', 'Updated');
    }
    
    
    
    //Createメソッド
    
     public function create(){

        return view('posts.create');
        
        
    }
    
    //aboutメソッドに飛ぶ
    public function about(){
        return view('posts.about');
    }
    
    //aboutmeメソッドに飛ぶ
    public function aboutme(){
        return view('posts.aboutme');
    }
    
    
    //show　メソッド
    public function show($id){
        
        //idが無かったら例外処理を行う
        $post = Post::findOrFail($id);
    
        //postsにidを入て。/posts/show.blade.phpに飛ぶ
        return view('posts.show')->with('post',$post);
    }
    
    //editメソッド
    public function edit($id){
        
        //idが無かったら例外処理を行う
        $post = Post::findOrFail($id);
    
        return view('posts.edit')->with('post',$post);
    }
    
    //destoryメソッド
     public function destroy($id){
        
        //idが無かったら例外処理を行う
        $post = Post::findOrFail($id);
        $post -> delete();
         
         
        return redirect('/')->with('flash_message', 'Deleted');
    }
    
    //indexメソッド
      public function index(){
        //$posts=\App\Post::all();
        /*
        でーたを取得
        $posts=Post::all();
        */
      
        /*取得データを昇順に表示する。
        (1)$posts =Post::orderBy('created','desc')->get();
        (2)Lalabelの組み込み関数を利用する。
        */
        $posts = Post::latest('created_at')->get();
        //データを確認する。デバック要
        //dd($posts->toArray()); //duimp die
        
        /*
        $postsの中身が空だった場合はこうかく。
        */
       // $posts = [];
        
          
        
        
        //viewに値を飛ばす
        //return view('posts.index',['posts'=>$posts]);
        //withを使う
        return view('posts.index')->with('posts',$posts);
    }
}
