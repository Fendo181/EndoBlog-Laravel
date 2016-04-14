<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




//webルーティング 下が優先される!

Route::group(['middleware' => ['web']],function(){
        //いつもの
        Route::get('/',function(){
            return "welcome!!Laravel!";
             //return view('welcome');
            
        });
        
        //phponfo
        Route::get('/php',function(){
            return phpinfo();
        });
        /*
        Route::get('/{name}',function($name){
            return 'hello!'.$name;
        });
        */
        
        //Post画面(仮)
        /*
        Route::get('/posts',function(){
            return view('posts.index');
        });
        */
        
        //URL(localhost/)画面にアクセスしたら、にgetでPostsContollerのindexメソッドを呼び出す
        Route::get('/','PostsController@index');
    
        //URL(localhost/about)にアクセスしたら,getでPostcontorollerにaboutメソッドを呼び出す。
        Route::get('/about','PostsController@about');
    
        ////URL(localhost/about)にアクセスしたら,getでPostcontorollerにaboutmeメソッドを呼び出す。
         Route::get('/aboutme','PostsController@aboutme');
    
        //URL(localhost/posts/createにアクセスしたら、getでPostsContollerのicreateメソッドを呼び出す)
        Route::get('/posts/create','PostsController@create');
        
        
    
        //postsのidを呼び出す際になんとしてでもshowに飛ぶ
        Route::get('/posts/{id}','PostsController@show');
    
        //postsのidを呼び出す際になんとしてでもshowに飛ぶ
        Route::get('/posts/{id}/edit','PostsController@edit');
    
        //update画面の編集
        Route::patch('/posts/{id}','PostsController@update');
    
        //deleteメソッド
        Route::delete('/posts/{id}','PostsController@destroy');
    
    
    
    
        //URL(localhost/posts/にアクセスしたら、postsでPostsContollerのstoreメソッドを呼び出す)
        Route::post('/posts','PostsController@store');
    
    
    });