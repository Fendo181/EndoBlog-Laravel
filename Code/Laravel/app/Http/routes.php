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

//Route::group(['middleware' => ['web']],function(){
  
        //phponfo
        Route::get('/php',function(){
            return phpinfo();
        });

        /*## 遠藤カレンダーの設定  ## */

        /*DBの中身を表示 */
        Route::get('/calendar/note','CalendarController@note');
        /* カレンダー中身 */
        Route::get('/calendar','CalendarController@index');
        
        
        /* todo * ※{id}よりも前に記述する。*/
        /* 予定を記述する範囲 */
        route::get('/calendar/todo','calendarcontroller@todo');

        /*create ※{id}よりも前に記述する。*/
        Route::get('/calendar/create','CalendarController@create');
        
        /* show */
        Route::get('/calendar/{id}','CalendarController@show');

        /* edit */
        Route::get('/calendar/{id}/edit','CalendarController@edit');
        
        /* store */
        Route::post('/calendar','CalendarController@store');

        /* update */
        Route::patch('/calendar/{id}','CalendarController@update');

        /*  delete */
        Route::delete('/calendar/{id}','CalendarController@destroy');

   

        


        
        
        /*## End blogのrouteing 設定  ##*/

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
        //postsのidを呼び出す際になんとしてでもeditに飛ぶ
        Route::get('/posts/{id}/edit','PostsController@edit');
        //update画面の編集
        Route::patch('/posts/{id}','PostsController@update');
        //deleteメソッド
        Route::delete('/posts/{id}','PostsController@destroy');
        //URL(localhost/posts/にアクセスしたら、postsでPostsContollerのstoreメソッドを呼び出す)
        Route::post('/posts','PostsController@store');
    
//});